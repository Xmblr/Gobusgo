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
use Sonata\FormatterBundle\Form\Type\FormatterType;

use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\DateTimePickerType;
use Sonata\DoctrineORMAdminBundle\Filter\CallbackFilter;
use Sonata\FormatterBundle\Formatter\Pool as FormatterPool;
use Sonata\NewsBundle\Form\Type\CommentStatusType;
use Sonata\NewsBundle\Model\CommentInterface;
use Sonata\NewsBundle\Permalink\PermalinkInterface;
use Sonata\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



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
        $isHorizontal = 'horizontal' == $this->getConfigurationPool()->getOption('form_type');
        $formMapper
//            ->add('id')
            ->add('title')
            ->add('h1')
            ->add('description')
            ->add('url')
//            ->add('author')
//            ->add('blog')
//            ->add('blog') // source content
//            ->add('rawContent') // source content
//            ->add('contentFormatter', FormatterType::class, [
//                'source_field' => 'rawContent',
//                'target_field' => 'blog',
//            ])
//            ->add('image', 'sonata_media_type', array(
//                'provider' => 'sonata.media.provider.image',
//                'context'  => 'blog',
//                'label'=>'Главное фото'
//            ))
            ->add('blog', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml',
                'ckeditor_context' => 'news', // optional
            ))

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
            ->add('h1')
            ->add('description')
            ->add('url')
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
            ->addIdentifier('h1')
            ->addIdentifier('description')
            ->addIdentifier('url')
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