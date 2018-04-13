<?php

// src/AppBundle/Admin/CategoryAdmin.php
namespace Gobusgo\GobusgoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CargoAdmin extends Admin
{
    protected $baseRouteName = 'cargo_admin';
    protected $baseRoutePattern = 'cargo_admin';


    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('width')
            ->add('height')
            ->add('lenght')
            ->add('weight')
            ->add('CN')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('width')
            ->add('height')
            ->add('lenght')
            ->add('weight')
            ->add('CN')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('width')
            ->addIdentifier('height')
            ->addIdentifier('lenght')
            ->addIdentifier('weight')
            ->addIdentifier('CN')
        ;
    }
}