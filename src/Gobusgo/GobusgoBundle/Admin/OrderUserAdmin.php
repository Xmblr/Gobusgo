<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\Cargo;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderUserAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'order_user';
    protected $baseRoutePattern = 'order_user';

    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'id',
    ];


    public function getUserId ()
    {
        $userId = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        return $userId;
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->eq($query->getRootAliases()[0].'.userId',':userId')

        );
        $query->setParameter('userId',$this->getUserId());
        return $query;
    }

    public function Transport()
    {
        $transport = \Swift_SmtpTransport::newInstance(
            $this->getConfigurationPool()->getContainer()->getParameter('mailer_host'),
            $this->getConfigurationPool()->getContainer()->getParameter('mailer_port'),
            $this->getConfigurationPool()->getContainer()->getParameter('mailer_encryption')
        )
            ->setUsername($this->getConfigurationPool()->getContainer()->getParameter('mailer_user'))
            ->setPassword($this->getConfigurationPool()->getContainer()->getParameter('mailer_password'));

        return $mailer = \Swift_Mailer::newInstance($transport);

    }

    public function sendEmail($subject, $message, $from, $to)
    {
        $mailer = $this->Transport();

        $message = (new \Swift_Message($subject))
            ->setFrom($from)
            ->setTo($to)
            ->setBody($message, 'text/html')
        ;

        $mailer->send($message);
    }

    public function postPersist($order)
    {
        $this->sendEmail(
            'Новая заявка',
            'На сайте оставили заявку. Для просмотра перейдите по /admin/order_admin/' . $order->getId() . '/edit Ссылке', //<a href="http://gobusgo.by/admin/order_admin/' . $order->getId() . '/edit">Ссылке</a>
            $this->getConfigurationPool()->getContainer()->getParameter('mailer_user'),
            $this->getConfigurationPool()->getContainer()->getParameter('mailer_user')
        );
        $this->sendEmail(
            'Ваша заявка на Gobusgo.by',
            'Спасибо за заявку. В ближайшее время с Вами свяжутся наши консультанты для обсуждения деталей заказа. Для просмотра перейдите по /admin/order_user/' . $order->getId() . '/edit Ссылке', //<a href="http://gobusgo.by/admin/order_user/' . $order->getId() . '/show">Ссылке</a>
            $this->getConfigurationPool()->getContainer()->getParameter('mailer_user'),
            $this->getUserId()->getEmail()
        );
    }

    public function prePersist($order)
    {
        $order->setUserId($this->getUserId());
        $order->setDateOfOrder(new \DateTime());
        $order->setStatus(0);
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('edit')
            ->remove('delete')
            ->add('cancel', $this->getRouterIdParameter().'/cancel')
            ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Создание заявки', ['class' => 'col-md-12'])
            ->add('cargoId', ModelListType::class, [
                'class'=>Cargo::class,
                'label' => 'Шаблон груза',
                'btn_delete' => false,
            ],array(
                'admin_code' => 'admin.user.cargo',

            ))

            ->add('quantityOfCargo', null, array('label' => 'Количество груза'))
            ->add('shippingAddress', ModelListType::class, [
                'class'=>Address::class,
                'label' => 'Адрес отправки',
                'btn_delete' => false,
            ],array(
                'admin_code' => 'admin.user.address',

            ))
            ->add('deliveryAddress', ModelListType::class, [
                'class'=>Address::class,
                'label' => 'Адрес доставки',
                'btn_delete' => false,
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress', ModelListType::class, [
                'class' => Address::class,
                'label' => 'Дополнительный адрес',
                'btn_delete' => false,
                'required' => false
            ], array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('price',null,array('label'=>'Цена'))
            ->add('notice', TextareaType::class, array('label' => 'Примечание', 'required' => false))
            ->end()
            ->with('Пользователь', ['class' => 'col-md-6'])
            ->end()
            ->with('Карта', ['class' => 'col-md-6'])
            ->end()

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', null, array('label' => 'Номер заказа'))
            ->add('status', null, array('label' => 'Статус'))
            ->add('dateOfOrder', null, array('label' => 'Дата заявки'))
            ->add('cargoId.name', null, array('label' => 'Груз'))
            ->add('quantityOfCargo', null, array('label' => 'Кол-во груза'))
            ->add('price', null, array('label' => 'Оценочная стоимость'))
            ->add('shippingAddress.name', null, array('label' => 'Адрес отправки'))
            ->add('deliveryAddress.name', null, array('label' => 'Адрес доставки'))
            ->add('additionalAddress.name', null, array('label' => 'Дополнительный адрес'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('id', null, array('label' => 'Номер заказа'))
            ->addIdentifier('status', null, array('template' => '@GobusgoGobusgo/Admin/CRUD/list_boolean.html.twig', 'label' => 'Статус'))
            ->add('dateOfOrder', null, array('label' => 'Дата заявки'))
            ->add('cargoId.name', null, array('label' => 'Груз'))
            ->add('quantityOfCargo', null, array('label' => 'Кол-во груза'))
            ->add('price', null, array('label' => 'Оценочная стоимость'))
            ->add('shippingAddress.name', null, array('label' => 'Адрес отправки'))
            ->add('deliveryAddress.name', null, array('label' => 'Адрес доставки'))
            ->add('additionalAddress.name', null, array('label' => 'Дополнительный адрес'))
            ->add('_action', null, [
                'actions' => [
                    'cancel' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_cancel.html.twig'],
                ],'label'=>'Действия'
            ])
        ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Общее', ['class' => 'col-md-6'])
            ->add('id',null,array('label'=>'Номер заказа'))
            ->add('status',null,array('label'=>'Статус'))
            ->add('dateOfOrder',null,array('label'=>'Дата заказа'))
            ->add('quantityOfCargo',null,array('label'=>'Количество'))
            ->add('price',null,array('label'=>'Цена'))
            ->end()
            ->with('Груз', ['class' => 'col-md-6'])
            ->add('cargoId.name',null,array('label'=>'Наименование'))
            ->add('cargoId.width',null,array('label'=>'Ширина'))
            ->add('cargoId.height',null,array('label'=>'Высота'))
            ->add('cargoId.lenght',null,array('label'=>'Длина'))
            ->add('cargoId.weight',null,array('label'=>'Вес'))
            ->end()
            ->with('Откуда', ['class' => 'col-md-4'])
            ->add('shippingAddress.name',null,array('label'=>'Имя отправителя'))
            ->add('shippingAddress.organization',null,array('label'=>'Организация'))
            ->add('shippingAddress.city',null,array('label'=>'Город'))
            ->end()
            ->with('Куда', ['class' => 'col-md-4'])
            ->add('deliveryAddress.name',null,array('label'=>'Имя получателя'))
            ->add('deliveryAddress.organization',null,array('label'=>'Организация'))
            ->add('deliveryAddress.city',null,array('label'=>'Город'))
            ->end();
    }
}