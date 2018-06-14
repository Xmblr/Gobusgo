<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Doctrine\DBAL\Types\DateTimeType;
use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\Cargo;
use Gobusgo\GobusgoBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'order_admin';
    protected $baseRoutePattern = 'order_admin';


    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('userId', ModelType::class,[
                'class'=>User::class,
                'label' => 'Пользователь',
                'property'=>'fullName',
            ])
            ->add('cargoId', ModelType::class, [
                'class'=>Cargo::class,
                'label' => 'Груз',
                'property'=>'name'
            ],array(
                'admin_code' => 'admin.cargo'
            ))
            ->add('quantityOfCargo', null, array('label' => 'Кол-во груза'))
            ->add('price', null, array('label' => 'Цена'))
            ->add('shippingAddress', ModelType::class, [
                'class'=>Address::class,
                'label' => 'Адрес отправки',
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('deliveryAddress', ModelType::class, [
                'class'=>Address::class,
                'label' => 'Адрес доставки',
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress', ModelType::class, [
                'class'=>Address::class,
                'label' => 'Дополнительный адрес',
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
//            ->add('additionalAddress2', ModelType::class, [
//                'class'=>Address::class,
//                'property' => 'name'
//            ],array(
//                'admin_code' => 'admin.address'
//            ))
//            ->add('additionalAddress3', ModelType::class, [
//                'class'=>Address::class,
//                'property' => 'name'
//            ],array(
//                'admin_code' => 'admin.address'
//            ))
//            ->add('additionalAddress4', ModelType::class, [
//                'class'=>Address::class,
//                'property' => 'name'
//            ],array(
//                'admin_code' => 'admin.address'
//            ))
//            ->add('additionalAddress5', ModelType::class, [
//                'class'=>Address::class,
//                'property' => 'name'
//            ],array(
//                'admin_code' => 'admin.address'
//            ))
            ->add('dateOfOrder', DateTimeType::DATETIME, array('label' => 'Дата заявки'))
            ->add('status', null, array('label' => 'Статус'))
            ->add('notice', TextareaType::class, array('label' => 'Примечания', 'required' => false))
        ;
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
            ->add('shippingAddress.name', null, array('label' => 'Адрес отправки'))
            ->add('deliveryAddress.name', null, array('label' => 'Адрес доставки'))
            ->add('additionalAddress.name', null, array('label' => 'Дополнительный адрес'))
//            ->add('additionalAddress2.name')
//            ->add('additionalAddress3.name')
//            ->add('additionalAddress4.name')
//            ->add('additionalAddress5.name')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {

        $listMapper
            ->addIdentifier('id', null, array('label' => 'Номер заказа'))
            ->addIdentifier('status', null, array('template' => '@GobusgoGobusgo/Admin/CRUD/list_boolean.html.twig', 'label' => 'Статус'))
            ->add('dateOfOrder', null, array('label' => 'Дата заявки'))
            ->add('userId.fullName', null, array('label' => 'Пользователь'))
            ->add('cargoId.name', null, array('label' => 'Груз'))
            ->add('quantityOfCargo', null, array('label' => 'Кол-во груза'))
            ->add('price', null, array('label' => 'Оценочная стоимость'))
            ->add('shippingAddress.name', null, array('label' => 'Адрес отправки'))
            ->add('deliveryAddress.name', null, array('label' => 'Адрес доставки'))
            ->add('additionalAddress.name', null, array('label' => 'Дополнительный адрес'))
            ->add('_action', null, [
                'label' => 'Действия',
                'actions' => [
                    'edit' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_edit.html.twig'],
                    'delete' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_delete.html.twig'],
                ]
            ])
//            ->addIdentifier('additionalAddress2.name')
//            ->addIdentifier('additionalAddress3.name')
//            ->addIdentifier('additionalAddress4.name')
//            ->addIdentifier('additionalAddress5.name')
        ;
    }
}