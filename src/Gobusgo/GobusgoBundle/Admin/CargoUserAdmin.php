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
            ->add('name', null,array('label'=>'Наименование груза'))
            ->add('width', null,array('label'=>'Ширина'))
            ->add('height', null,array('label'=>'Высота'))
            ->add('lenght', null,array('label'=>'Длинна'))
            ->add('weight', null,array('label'=>'Вес, кг'))
            ->add('CN', null,array('label'=>'Номер ТТН'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null,array('label'=>'Наименование груза'))
            ->add('width', null,array('label'=>'Ширина'))
            ->add('height', null,array('label'=>'Высота'))
            ->add('lenght', null,array('label'=>'Длинна'))
            ->add('weight', null,array('label'=>'Вес, кг'))
            ->add('CN', null,array('label'=>'Номер ТТН'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null,array('label'=>'Наименование груза'))
            ->addIdentifier('width', null,array('label'=>'Ширина'))
            ->addIdentifier('height', null,array('label'=>'Высота'))
            ->addIdentifier('lenght', null,array('label'=>'Длинна'))
            ->addIdentifier('weight', null,array('label'=>'Вес, кг'))
            ->addIdentifier('CN', null,array('label'=>'Номер ТТН'))
            ->add('_action', null, [
                'label' => 'Действия',
                'actions' => [
                    'edit' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_edit.html.twig'],
                    'delete' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_delete.html.twig'],
                ]
            ])
        ;
    }
}