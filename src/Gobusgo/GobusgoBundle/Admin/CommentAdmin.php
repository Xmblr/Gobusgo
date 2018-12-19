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

    public function toString($object)
    {
        return 'Просмотр комментария к запси '.$object->getBlog();

    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('id')
            ->add('user', null,array('label'=>'Пользователь'))
            ->add('comment', null,array('label'=>'Комментарий'))
            ->add('approved', null,array('label'=>'Одобрено'))
            ->add('blog', null,array('label'=>'Новость'))
            ->add('created', null,array('label'=>'Создано'))
            ->add('updated', null,array('label'=>'Обновлено'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('user', null,array('label'=>'Пользователь'))
            ->add('comment', null,array('label'=>'Комментарий'))
            ->add('approved', null,array('label'=>'Одобрено'))
            ->add('blog', null,array('label'=>'Новость'))
            ->add('created', null,array('label'=>'Создано'))
            ->add('updated', null,array('label'=>'Обновлено'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->addIdentifier('id')
            ->add('user', null,array('label'=>'Пользователь'))
            ->add('comment', null,array('label'=>'Комментарий'))
            ->add('approved', null,array('label'=>'Одобрено'))
            ->add('blog', null,array('label'=>'Новость'))
            ->add('created', null,array('label'=>'Создано'))
            ->add('updated', null,array('label'=>'Обновлено'))
        ;
    }
}