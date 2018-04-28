<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\ORM\EntityRepository;
use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\Cargo;
use Gobusgo\GobusgoBundle\Entity\User;
use Gobusgo\GobusgoBundle\Form\CargoType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SwiftmailerBundle\DependencyInjection\SwiftmailerTransportFactory;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints\DateTime;


class OrderUserAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'order_user';
    protected $baseRoutePattern = 'order_user';

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
            ->setFrom($this->getConfigurationPool()->getContainer()->getParameter('mailer_user'))
            ->setTo($this->getConfigurationPool()->getContainer()->getParameter('mailer_user'))
            ->setBody($message, 'text/html')//            ->setBody($this->setTemplates(array('template'=>'@GobusgoGobusgo/Page/callEmail.txt.twig', 'order' => $order)))
        ;

        $mailer->send($message);
    }

    public function postPersist($order)
    {
        $this->sendEmail(
            'Новая заявка',
            'На сайте оставили заявку. для просмотра перейдите по <a href="http://gobusgo.by/admin/order_admin/' . $order->getId() . '/edit">Ссылке</a>',
            $this->getConfigurationPool()->getContainer()->getParameter('mailer_user'),
            $this->getConfigurationPool()->getContainer()->getParameter('mailer_user')
        );
        $this->sendEmail(
            'Ваша заявка на Gobusgo.by',
            'Спасибо за заявку. В ближайшее время с Вами свяжутся наши консультанты для обсуждения деталей заказа. Для просмотра перейдите по <a href="http://gobusgo.by/admin/order_user/' . $order->getId() . '/show">Ссылке</a>',
            $this->getConfigurationPool()->getContainer()->getParameter('mailer_user'),
            $this->getUserId()->getEmail()
        );
    }

    public function prePersist($order)
    {

//        $this->sendEmail(array('name'=>$this->getUserId(),'date'=>'new \DateTime()'));

        $order->setUserId($this->getUserId());
        $order->setDateOfOrder(new \DateTime());
        $order->setStatus(0);
    }


    public function preEdit($order)
    {
        throw new AccessDeniedException();
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('edit')
            ->remove('remove');

    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine.orm.entity_manager');

        $qb1 = $em->createQueryBuilder();
        $qb1->select('c')->from(Cargo::class, 'c')->where('c.userId = :userId')->setParameters(['userId'=>$this->getUserId()]);
        $cargo_available_choices = $qb1->getQuery()->getResult();

        $qb2 = $em->createQueryBuilder();
        $qb2->select('a')->from(Address::class, 'a')->where('a.userId = :userId')->setParameters(['userId'=>$this->getUserId()]);
        $address_available_choices = $qb2->getQuery()->getResult();



        $formMapper

//            ->add('cargoId', CargoType::class, array(
//                'class'=>Cargo::class,
//                'compound'=>true,
////                'allow_add' => true,
//                'by_reference' => false,
////                'allow_delete' => true
//            ),array(
//                'admin_code' => 'admin.user.cargo'
//            ))
            ->add('cargoId', ModelListType::class, [
                'class'=>Cargo::class,
//                'property'=>'name',
//                'choices' => $cargo_available_choices
            ],array(
                'admin_code' => 'admin.user.cargo'
            ))
            ->add('price',null,array('label'=>'Цена'))
            ->add('quantityOfCargo')
            ->add('shippingAddress', ModelListType::class, [
                'class'=>Address::class,
//                'mapped'=>'name',
//                'choices' =>  $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('deliveryAddress', ModelListType::class, [
                'class'=>Address::class,
//                'property'=>'fullName',
//                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress', ModelListType::class, [
                'class'=>Address::class,
//                'property'=>'fullName',
//                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
//            ->add('additionalAddress2', ModelListType::class, [
//                'class'=>Address::class,
////                'property'=>'fullName',
////                'choices' => $address_available_choices
//            ],array(
//                'admin_code' => 'admin.user.address'
//            ))
//            ->add('additionalAddress3', ModelListType::class, [
//                'class'=>Address::class,
////                'property'=>'fullName',
////                'choices' => $address_available_choices
//            ],array(
//                'admin_code' => 'admin.user.address'
//            ))
//            ->add('additionalAddress4', ModelListType::class, [
//                'class'=>Address::class,
////                'property'=>'fullName',
////                'choices' => $address_available_choices
//            ],array(
//                'admin_code' => 'admin.user.address'
//            ))
//            ->add('additionalAddress5', ModelListType::class, [
//                'class'=>Address::class,
////                'property'=>'fullName',
////                'choices' => $address_available_choices
//            ],array(
//                'admin_code' => 'admin.user.address'
//            ))
            ->add('notice', TextareaType::class)

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('status')
            ->add('dateOfOrder')
            ->add('userId.fullName')
            ->add('cargoId.name')
            ->add('price')
            ->add('quantityOfCargo')
            ->add('shippingAddress.name')
            ->add('deliveryAddress.name')
            ->add('additionalAddress.name')
//            ->add('additionalAddress2.name')
//            ->add('additionalAddress3.name')
//            ->add('additionalAddress4.name')
//            ->add('additionalAddress5.name')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('status', null, array('template' => '@GobusgoGobusgo/Admin/CRUD/list_boolean.html.twig'))
            ->addIdentifier('dateOfOrder')
            ->addIdentifier('userId.fullName')
            ->addIdentifier('cargoId.name')
            ->addIdentifier('price')
            ->addIdentifier('quantityOfCargo')
            ->addIdentifier('shippingAddress.name')
            ->addIdentifier('deliveryAddress.name')
            ->addIdentifier('additionalAddress.name')
//            ->addIdentifier('additionalAddress2.name')
//            ->addIdentifier('additionalAddress3.name')
//            ->addIdentifier('additionalAddress4.name')
//            ->addIdentifier('additionalAddress5.name')
        ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Общее', ['class' => 'col-md-6'])
            ->add('id')
            ->add('status')
            ->add('dateOfOrder')
            ->add('quantityOfCargo')
            ->add('price')
            ->end()
            ->with('Груз', ['class' => 'col-md-6'])
            ->add('cargoId.name')
            ->add('cargoId.width')
            ->add('cargoId.height')
            ->add('cargoId.lenght')
            ->add('cargoId.weight')
            ->end()
            ->with('Откуда', ['class' => 'col-md-4'])
            ->add('shippingAddress.name')
            ->add('shippingAddress.organization')
            ->add('shippingAddress.city')
            ->end()
            ->with('Куда', ['class' => 'col-md-4'])
            ->add('deliveryAddress.name')
            ->add('deliveryAddress.organization')
            ->add('deliveryAddress.city')
            ->end();
    }
}