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
            ->add('h1', null,array('label'=>'Заголовок (H1)'))
            ->add('title', null,array('label'=>'Заголовок (Title)'))
            ->add('description', null,array('label'=>'Описание (Description)'))
            ->add('intro', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml',
                'ckeditor_context' => 'news', // optional
            ))
            ->add('text', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml',
                'ckeditor_context' => 'news', // optional
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('url')
            ->add('h1', null,array('label'=>'Заголовок (H1)'))
            ->add('title', null,array('label'=>'Заголовок (Title)'))
            ->add('description', null,array('label'=>'Описание (Description)'))
            ->add('intro', null,array('label'=>'Интро (Intro_text)'))
            ->add('text', null,array('label'=>'Текст (Text)'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('url')
            ->addIdentifier('h1', null,array('label'=>'Заголовок (H1)'))
            ->addIdentifier('title', null,array('label'=>'Заголовок (Title)'))
            ->addIdentifier('description', null,array('label'=>'Описание (Description)'))
            ->add('intro', null,array('label'=>'Интро (Intro_text)'))
            ->add('text', null,array('label'=>'Текст (Text)'))
        ;
    }
}