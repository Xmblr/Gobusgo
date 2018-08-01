<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\City;
use Gobusgo\GobusgoBundle\Entity\User;
use Gobusgo\GobusgoBundle\Entity\Blog;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

class BlogAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'blog_admin';
    protected $baseRoutePattern = 'blog_admin';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id')
            ->add('title')
            ->add('author')
            ->add('blog')
            ->add('image', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context'  => 'blog',
                'label'=>'Главное фото'
            ))
            ->add('tags')
//            ->add('comments')
            ->add('created')
            ->add('updated')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('author')
            ->add('blog')
            ->add('image')
            ->add('tags')
//            ->add('comments')
            ->add('created')
            ->add('updated')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('title')
            ->addIdentifier('author')
            ->addIdentifier('blog')
            ->addIdentifier('image')
            ->addIdentifier('tags')
//            ->addIdentifier('comments')
            ->addIdentifier('created')
            ->addIdentifier('updated')
        ;
    }
}