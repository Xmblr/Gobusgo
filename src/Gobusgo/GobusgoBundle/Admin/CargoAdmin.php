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
            ->add('name', null, array('label' => 'Наименование груза'))
            ->add('width', null, array('label' => 'Ширина'))
            ->add('height', null, array('label' => 'Высота'))
            ->add('lenght', null, array('label' => 'Длинна'))
            ->add('weight', null, array('label' => 'Вес, кг'))

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Наименование груза'))
            ->add('width', null, array('label' => 'Ширина'))
            ->add('height', null, array('label' => 'Высота'))
            ->add('lenght', null, array('label' => 'Длинна'))
            ->add('weight', null, array('label' => 'Вес, кг'))

        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('name', null, array('label' => 'Наименование груза'))
            ->addIdentifier('width', null, array('label' => 'Ширина'))
            ->addIdentifier('height', null, array('label' => 'Высота'))
            ->addIdentifier('lenght', null, array('label' => 'Длинна'))
            ->addIdentifier('weight', null, array('label' => 'Вес, кг'))

            ->add('_action', null, [
                'label' => 'Действия',
                'actions' => [
                    'edit' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_edit.html.twig'],
                    'delete' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_delete.html.twig'],
                ]
            ])
        ;
    }
}