<?php

namespace Gobusgo\GobusgoBundle\Admin;


use Gobusgo\GobusgoBundle\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
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
            ->add('title')
            ->add('h1')
            ->add('description')
            ->add('url')
            ->add('blog', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml',
                'ckeditor_context' => 'news', // optional
            ))

            ->add('image', 'sonata_type_model_list', array(), array(
                'link_parameters' => array(
                    'context' => 'blog',

            ),
                ))
//            ->add('tags')
            ->add('category', ModelType::class, [
                'class' => Category::class,
                'label' => 'Категория',
                'property' => 'name'
            ], array(
                'admin_code' => 'admin.category'
            ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('h1')
            ->add('description')
            ->add('url')
            ->add('author')
            ->add('blog')
//            ->add('tags')
            ->add('category')
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
            ->addIdentifier('h1')
            ->addIdentifier('description')
            ->addIdentifier('url')
            ->addIdentifier('author')
            ->addIdentifier('blog')
//            ->addIdentifier('tags')
            ->addIdentifier('category')
            ->addIdentifier('created')
            ->addIdentifier('updated')
        ;
    }
}