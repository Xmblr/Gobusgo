<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\City;
use Gobusgo\GobusgoBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

class AddressAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'address_admin';
    protected $baseRoutePattern = 'address_admin';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->add('name', 'text')
            ->add('organization')
            ->add('city', ModelType::class, [
                'class' => City::class,
                'property' => 'name'])
            ->add('street')
            ->add('userId', ModelType::class,[
                'class'=>User::class,
                'property'=>'fullName',
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('organization')
            ->add('city.name')
            ->add('street')
            ->add('userId.fullName')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ]
            ])
            ->addIdentifier('name')
            ->addIdentifier('organization')
            ->addIdentifier('city.name')
            ->addIdentifier('street')//            ->addIdentifier('userId.fullName')
        ;
    }
}