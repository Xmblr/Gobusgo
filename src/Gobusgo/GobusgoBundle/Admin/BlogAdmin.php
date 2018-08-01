<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\Category;
use Gobusgo\GobusgoBundle\Entity\City;
use Gobusgo\GobusgoBundle\Entity\User;
use Gobusgo\GobusgoBundle\Entity\Blog;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Form\Type\ModelType;

class BlogAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'blog_admin';
    protected $baseRoutePattern = 'blog_admin';


    public function getUserId ()
    {
        $userId = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        return $userId;
    }

    public function prePersist($object)
    {
        $object->setAuthor($this->getUserId());
    }



    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('id')
            ->add('title')
//            ->add('author')
            ->add('blog')
//            ->add('image', 'sonata_media_type', array(
//                'provider' => 'sonata.media.provider.image',
//                'context'  => 'blog',
//                'label'=>'Главное фото'
//            ))
            ->add('image', 'sonata_type_model_list', array(), array(
                'link_parameters' => array(
                    'context' => 'blog',

            ),
                ))
            ->add('tags')
            ->add('category', ModelType::class, [
                'class' => Category::class,
                'label' => 'Категория',
                'property' => 'name'
            ], array(
                'admin_code' => 'admin.category'
            ))
            ->add('url')

//            ->add('comments')
//            ->add('created')
//            ->add('updated')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('author')
            ->add('blog')
//            ->add('image')
            ->add('tags')
            ->add('category')
//            ->add('comments')
            ->add('created')
            ->add('updated')
            ->add('url')
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
//            ->addIdentifier('image')
            ->addIdentifier('tags')
            ->addIdentifier('category')
//            ->addIdentifier('comments')
            ->addIdentifier('created')
            ->addIdentifier('updated')
            ->addIdentifier('url')
        ;
    }
}