<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CargoUserAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'cargo_user';
    protected $baseRoutePattern = 'cargo_user';

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
            ->add('name')
            ->add('width')
            ->add('height')
            ->add('lenght')
            ->add('weight')
            ->add('CN')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('width')
            ->add('height')
            ->add('lenght')
            ->add('weight')
            ->add('CN')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('width')
            ->addIdentifier('height')
            ->addIdentifier('lenght')
            ->addIdentifier('weight')
            ->addIdentifier('CN')
        ;
    }
}