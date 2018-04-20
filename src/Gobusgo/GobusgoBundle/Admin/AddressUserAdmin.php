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
            ->add('name', 'text')
            ->add('organization')
            ->add('city', EntityType::class, [
                'class' => City::class,
                'choice_label' => 'name'])
            ->add('street')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('organization')
            ->add('city.name')
            ->add('street')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('organization')
            ->addIdentifier('city.name')
            ->addIdentifier('street')
        ;
    }
}