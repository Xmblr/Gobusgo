<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\NewsBundle\Model\Comment;
use Sonata\FormatterBundle\Form\Type\FormatterType;

class OrderAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'order';
    protected $baseRoutePattern = 'order';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('product', null)
            ->add('quantity', null)
            ->add('price', null)
            ->add('city', null)
            ->add('anotherCity', null)
            ->add('date', null)
            ->add('costOfDelivery', null)
            ->add('status', null)


        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('status')
            ->add('product')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('status')
            ->addIdentifier('product')
        ;
    }
}