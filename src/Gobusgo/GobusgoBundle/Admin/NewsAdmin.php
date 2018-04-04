<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\NewsBundle\Model\Comment;
use Sonata\FormatterBundle\Form\Type\FormatterType;

class   NewsAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'news';
    protected $baseRoutePattern = 'news';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('enabled', null, array('required' => false))
                ->add('author', 'sonata_type_model_list', array())
                ->add('category', 'sonata_type_model_list', array())
                ->add('title')
                ->add('abstract')
                ->add('contentFormatter', FormatterType::class)
                ->add('rawContent','textarea', array('attr' => array('class' => 'tinymce', 'tinymce'=>'{"theme":"medium"}')))
            ->end()

            ->with('Tags')
                ->add('tags', 'sonata_type_model', array('expanded' => true))
            ->end()
            ->with('Options')
                ->add('publicationDateStart')
                ->add('commentsCloseAt')
                ->add('commentsEnabled', null, array('required' => false))
                ->add('commentsDefaultStatus', 'choice', array('choices' => Comment::getStatusList(), 'expanded' => true))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('content')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->addIdentifier('content')
        ;
    }
}