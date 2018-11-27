<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Doctrine\DBAL\Types\DateTimeType;
use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\Cargo;
use Gobusgo\GobusgoBundle\Entity\Order;
use Gobusgo\GobusgoBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\Filter\ChoiceType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Show\ShowMapper;

class OrderAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'order_admin';
    protected $baseRoutePattern = 'order_admin';

    public function toString($object)
    {
        return 'Просмотр заказа номер '.$object->getId();
//        return $object instanceof Order
//            ? $object->getId()
//            : 'Заказ'; // shown in the breadcrumb on the create view
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Создание заявки', ['class' => 'col-md-12'])
            ->add('cargoId', ModelListType::class, [
                'class'=>Cargo::class,
                'label' => 'Шаблон груза',
                'btn_delete' => false,
                'required'=>true
            ],array(
                'admin_code' => 'admin.user.cargo',

            ))

            ->add('shippingCity', ChoiceType::class, [
                'choices'=>[
                    'Минск' => 'Минск',
                    'Москва' => 'Москва'
                ],
                'label' => 'Откуда'
            ])

            ->add('deliveryCity', ChoiceType::class, [
                'choices'=>[
                    'Москва' => 'Москва',
                    'Минск' => 'Минск'
                ],
                'label' => 'Куда'
            ])
            ->end()
//            ->add('city', EntityType::class, [
//                'class' => City::class,
//                'choice_label' => 'name',
//                'label' => 'Куда'])
            ->with('Дополнительные услуги', ['class' => 'col-md-12'])
//            ->add('shippingAddress', ModelListType::class, [
//                'class'=>Address::class,
//                'label' => 'Адрес вывоза груза',
////                'btn_delete' => false,
//            ],array(
//                'admin_code' => 'admin.user.address',
//                'required' => false
//            ))
//            ->add('deliveryAddress', ModelListType::class, [
//                'class'=>Address::class,
//                'label' => 'Адрес доставки груза',
////                'btn_delete' => false,
//            ],array(
//                'admin_code' => 'admin.user.address',
//                'required' => false
//            ))
            ->end()

            ->add('quantityOfCargo', IntegerType::class, array('label' => 'Количество груза, КГ'))
            ->add('price',IntegerType::class,array('label'=>'Цена, BYN', 'attr'=> array('readonly'=>'readonly')))
            ->add('notice', TextareaType::class, array('label' => 'Примечание', 'required' => false))
            ->end()
            ->with('Склад в Минске', ['class' => 'col-md-6'])
            ->end()
            ->with('Склад в Москве', ['class' => 'col-md-6'])
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', null, array('label' => 'Номер заказа'))
            ->add('status', null, array('label' => 'Статус'))
            ->add('dateOfOrder', null, array('label' => 'Дата заявки'))
            ->add('userId.fullName', null, array('label' => 'Пользователь'))
            ->add('cargoId.name', null, array('label' => 'Груз'))
            ->add('quantityOfCargo', null, array('label' => 'Кол-во груза'))
            ->add('price', null, array('label' => 'Оценочная стоимость'))
            ->add('shippingAddress.city.name', null, array('label' => 'Адрес отправки'))
            ->add('deliveryAddress.city.name', null, array('label' => 'Адрес доставки'))
            ->add('additionalAddress.city.name', null, array('label' => 'Дополнительный адрес'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('id', null, array('label' => 'Номер заказа'))
            ->addIdentifier('status', null, array('template' => '@GobusgoGobusgo/Admin/CRUD/list_boolean.html.twig', 'label' => 'Статус'))
            ->add('dateOfOrder', null, array('label' => 'Дата заявки'))
            ->add('userId.fullName', null, array('label' => 'Пользователь'))
            ->add('cargoId.name', null, array('label' => 'Груз'))
            ->add('quantityOfCargo', null, array('label' => 'Кол-во груза'))
            ->add('price', null, array('label' => 'Оценочная стоимость'))
//            ->add('shippingAddress.city.name', null, array('label' => 'Адрес отправки'))
//            ->add('deliveryAddress.city.name', null, array('label' => 'Адрес доставки'))
//            ->add('additionalAddress.city.name', null, array('label' => 'Доп. адрес'))
            ->add('_action', null, [
                'label' => 'Действия',
                'actions' => [
                    'show' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_show.html.twig'],
                    'delete' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_delete.html.twig'],
                ]
            ])
        ;
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('Общее', ['class' => 'col-md-6'])
            ->add('id', null, array('label' => 'Номер заказа'))
            ->add('status', null, array('label' => 'Статус'))
            ->add('dateOfOrder', null, array('label' => 'Дата заказа'))
            ->add('quantityOfCargo', null, array('label' => 'Количество'))
            ->add('price', null, array('label' => 'Цена'))
            ->end()
            ->with('Груз', ['class' => 'col-md-6'])
            ->add('cargoId.name', null, array('label' => 'Наименование'))
            ->add('cargoId.width', null, array('label' => 'Ширина'))
            ->add('cargoId.height', null, array('label' => 'Высота'))
            ->add('cargoId.lenght', null, array('label' => 'Длина'))
            ->add('cargoId.weight', null, array('label' => 'Вес'))
            ->end()
            ->with('Откуда', ['class' => 'col-md-6'])
            ->add('shippingAddress.name', null, array('label' => 'Имя отправителя'))
            ->add('shippingAddress.organization', null, array('label' => 'Организация'))
            ->add('shippingAddress.city', null, array('label' => 'Город'))
            ->add('shippingAddress.street', null, array('label' => 'Адрес'))
            ->end()
            ->with('Куда', ['class' => 'col-md-6'])
            ->add('deliveryAddress.name', null, array('label' => 'Имя получателя'))
            ->add('deliveryAddress.organization', null, array('label' => 'Организация'))
            ->add('deliveryAddress.city', null, array('label' => 'Город'))
            ->add('deliveryAddress.street', null, array('label' => 'Адрес'))
            ->end()
            ->with('Дополнительная информация', ['class' => 'col-md-6'])
            ->add('notice', null, array('label' => 'Примечание'))
            ->end();

    }
}