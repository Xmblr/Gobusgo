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
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('deliveryAddress', ModelType::class, [
                'class'=>Address::class,
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress1', ModelType::class, [
                'class'=>Address::class,
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress2', ModelType::class, [
                'class'=>Address::class,
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress3', ModelType::class, [
                'class'=>Address::class,
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress4', ModelType::class, [
                'class'=>Address::class,
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('additionalAddress5', ModelType::class, [
                'class'=>Address::class,
                'property' => 'name'
            ],array(
                'admin_code' => 'admin.address'
            ))
            ->add('dateOfOrder', DateTimeType::DATETIME)
            ->add('status')
            ->add('notice', TextareaType::class)
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('status')
            ->add('userId.fullName')
            ->add('cargoId.name')
            ->add('price')
            ->add('quantityOfCargo')
            ->add('shippingAddress.name')
            ->add('deliveryAddress.name')
            ->add('additionalAddress1.name')
            ->add('additionalAddress2.name')
            ->add('additionalAddress3.name')
            ->add('additionalAddress4.name')
            ->add('additionalAddress5.name')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('status', null, array('template' => '@GobusgoGobusgo/Admin/CRUD/list_boolean.html.twig'))
            ->addIdentifier('userId.fullName')
            ->addIdentifier('cargoId.name')
            ->addIdentifier('price')
            ->addIdentifier('quantityOfCargo')
            ->addIdentifier('shippingAddress.name')
            ->addIdentifier('deliveryAddress.name')
            ->addIdentifier('additionalAddress1.name')
            ->addIdentifier('additionalAddress2.name')
            ->addIdentifier('additionalAddress3.name')
            ->addIdentifier('additionalAddress4.name')
            ->addIdentifier('additionalAddress5.name')
        ;
    }
}