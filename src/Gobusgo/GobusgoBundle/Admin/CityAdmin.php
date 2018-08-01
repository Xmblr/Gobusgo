<?php

// src/AppBundle/Admin/CategoryAdmin.php
namespace Gobusgo\GobusgoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CityAdmin extends Admin
{

    protected $baseRouteName = 'city';
    protected $baseRoutePattern = 'city';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', null, array('label' => 'Город'));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name', null, array('label' => 'Город'));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper->addIdentifier('name', null, array('label' => 'Город'));
    }
}