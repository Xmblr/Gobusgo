<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\City;
use Gobusgo\GobusgoBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

class AddressAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'address_admin';
    protected $baseRoutePattern = 'address_admin';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with(' ')
            ->add('name', null,array('label'=>'ФИО получателя / отправителя'))
            ->add('phone', null, array('label' => 'Контактный телефон'))
            ->add('organization', null, array('label' => 'Организация'))
            ->add('city', EntityType::class, [
                'class' => City::class,
                'choice_label' => 'name',
                'label' => 'Город'])
            ->add('street', null,array('label'=>'Адрес'))
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null,array('label'=>'ФИО получателя / отправителя'))
            ->add('phone', null, array('label' => 'Контактный телефон'))
            ->add('organization', null,array('label'=>'Организация'))
            ->add('city.name', null,array('label'=>'Имя'))
            ->add('street', null, array('label' => 'Адрес'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);

        $listMapper
            ->add('_action', null, [
                'actions' => [
                    'edit' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_edit.html.twig'],
                    'delete' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_delete.html.twig'],
                ]
            ])
            ->addIdentifier('name', null,array('label'=>'ФИО получателя / отправителя'))
            ->addIdentifier('phone', null, array('label' => 'Контактный телефон'))
            ->addIdentifier('organization', null,array('label'=>'Организация'))
            ->addIdentifier('city.name', null,array('label'=>'Город'))
            ->addIdentifier('street', null,array('label'=>'Адрес'))

        ;
    }
}