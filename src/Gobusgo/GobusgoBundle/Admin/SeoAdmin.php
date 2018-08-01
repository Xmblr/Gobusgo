<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class SeoAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'seo_admin';
    protected $baseRoutePattern = 'seo_admin';

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('delete')
        ;
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('url', null,array('attr'=>array('readonly'=>'readonly')))
            ->add('h1')
            ->add('title')
            ->add('description')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('url')
            ->add('h1')
            ->add('title')
            ->add('description')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('url')
            ->addIdentifier('h1')
            ->addIdentifier('title')
            ->addIdentifier('description')
        ;
    }
}