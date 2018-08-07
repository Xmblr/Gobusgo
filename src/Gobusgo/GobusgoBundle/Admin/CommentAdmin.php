<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CommentAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'comments_admin';
    protected $baseRoutePattern = 'comments_admin';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id')
            ->add('user')
            ->add('comment')
            ->add('approved')
            ->add('blog')
            ->add('created')
            ->add('updated')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('user')
            ->add('comment')
            ->add('approved')
            ->add('blog')
            ->add('created')
            ->add('updated')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('user')
            ->addIdentifier('comment')
            ->addIdentifier('approved')
            ->addIdentifier('blog')
            ->addIdentifier('created')
            ->addIdentifier('updated')
        ;
    }
}