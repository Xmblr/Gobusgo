<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class   UserAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'users';
    protected $baseRoutePattern = 'users';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->add('username', 'text')
            ->add('email', 'text')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->addIdentifier('email')
        ;
    }
}