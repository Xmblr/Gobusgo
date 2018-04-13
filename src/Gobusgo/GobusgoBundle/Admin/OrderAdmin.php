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
                'property'=>'fullName',
            ])
            ->add('cargoId', ModelType::class, [
                'class'=>Cargo::class,
                'property'=>'name'
            ],array(
                'admin_code' => 'admin.cargo'
            ))
            ->add('price')
            ->add('quantityOfCargo')
            ->add('shippingAddress', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('deliveryAddress', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress1', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress2', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress3', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress4', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress5', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('dateOfOrder', DateTimeType::DATETIME)
            ->add('status')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('userId.fullName')
            ->add('cargoId.name')
            ->add('price')
            ->add('quantityOfCargo')
            ->add('shippingAddress.fullName')
            ->add('deliveryAddress.fullName')
            ->add('additionalAddress1.fullName')
            ->add('additionalAddress2.fullName')
            ->add('additionalAddress3.fullName')
            ->add('additionalAddress4.fullName')
            ->add('additionalAddress5.fullName')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('userId.fullName')
            ->addIdentifier('cargoId.name')
            ->addIdentifier('price')
            ->addIdentifier('quantityOfCargo')
            ->addIdentifier('shippingAddress.fullName')
            ->addIdentifier('deliveryAddress.fullName')
            ->addIdentifier('additionalAddress1.fullName')
            ->addIdentifier('additionalAddress2.fullName')
            ->addIdentifier('additionalAddress3.fullName')
            ->addIdentifier('additionalAddress4.fullName')
            ->addIdentifier('additionalAddress5.fullName')
        ;
    }
}