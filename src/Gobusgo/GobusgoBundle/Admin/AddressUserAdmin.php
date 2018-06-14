<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\City;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Finder\Exception\AccessDeniedException;

class AddressUserAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'address_user';
    protected $baseRoutePattern = 'address_user';

    public function getUserId ()
    {
        $userId = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        return $userId;
    }

    public function createQuery($context = array('list', 'select'))
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->eq($query->getRootAliases()[0].'.userId',':userId')

        );
        $query->setParameter('userId',$this->getUserId());
        return $query;
    }

    public function prePersist($address)
    {
        $address->setUserId($this->getUserId());

    }


    public function preEdit($address)
    {
        throw new AccessDeniedException();
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null,array('label'=>'ФИО получателя'))
            ->add('organization')
            ->add('city', EntityType::class, [
                'class' => City::class,
                'choice_label' => 'name'])
            ->add('street', null,array('label'=>'Адрес'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null,array('label'=>'ФИО получателя'))
            ->add('organization', null,array('label'=>'Организация'))
            ->add('city.name', null,array('label'=>'Имя'))
            ->add('street', null,array('label'=>'Имя'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null,array('label'=>'ФИО получателя'))
            ->addIdentifier('organization', null,array('label'=>'Организация'))
            ->addIdentifier('city.name', null,array('label'=>'Город'))
            ->addIdentifier('street', null,array('label'=>'Адрес'))
        ;
    }
}