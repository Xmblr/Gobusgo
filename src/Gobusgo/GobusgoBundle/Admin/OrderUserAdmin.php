<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Doctrine\DBAL\Types\DateTimeType;
use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\Cargo;
use Gobusgo\GobusgoBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints\DateTime;


class OrderUserAdmin extends AbstractAdmin
{

    protected $baseRouteName = 'order_user';
    protected $baseRoutePattern = 'order_user';

    public function getUserId ()
    {
        $userId = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        return $userId;
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query->andWhere(
            $query->expr()->eq($query->getRootAliases()[0].'.userId',':userId')

        );
        $query->setParameter('userId',$this->getUserId());
        return $query;
    }

    public function prePersist($order)
    {
        $order->setUserId($this->getUserId());
        $order->setDateOfOrder(new \DateTime());
        $order->setStatus(0);
    }


    public function preEdit($order)
    {
        throw new AccessDeniedException();
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine.orm.entity_manager');

        $qb1 = $em->createQueryBuilder();
        $qb1->select('c')->from(Cargo::class, 'c')->where('c.userId = :userId')->setParameters(['userId'=>$this->getUserId()]);
        $cargo_available_choices = $qb1->getQuery()->getResult();

        $qb2 = $em->createQueryBuilder();
        $qb2->select('a')->from(Address::class, 'a')->where('a.userId = :userId')->setParameters(['userId'=>$this->getUserId()]);
        $address_available_choices = $qb2->getQuery()->getResult();



        $formMapper

            ->add('cargoId', ModelType::class, [
                'class'=>Cargo::class,
                'property'=>'name',
                'choices' => $cargo_available_choices
            ],array(
                'admin_code' => 'admin.user.cargo'
            ))
            ->add('price')
            ->add('quantityOfCargo')
            ->add('shippingAddress', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName'
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('deliveryAddress', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName',
                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress1', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName',
                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress2', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName',
                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress3', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName',
                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress4', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName',
                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress5', ModelType::class, [
                'class'=>Address::class,
                'property'=>'fullName',
                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('status')
            ->add('userId.fullName')
            ->add('cargoId.name')
            ->add('price')
            ->add('quantityOfCargo')
            ->add('shippingAddress.fullName')
            ->add('deliveryAddress.fullName')
            ->add('additionalAddress1.fullName')
            ->add('additionalAddress2.fullName')
            ->add('additionalAddress3.fullName')
            ->add('additionalAddress4.fullName')
            ->add('additionalAddress5.fullName')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('status')
            ->addIdentifier('userId.fullName')
            ->addIdentifier('cargoId.name')
            ->addIdentifier('price')
            ->addIdentifier('quantityOfCargo')
            ->addIdentifier('shippingAddress.fullName')
            ->addIdentifier('deliveryAddress.fullName')
            ->addIdentifier('additionalAddress1.fullName')
            ->addIdentifier('additionalAddress2.fullName')
            ->addIdentifier('additionalAddress3.fullName')
            ->addIdentifier('additionalAddress4.fullName')
            ->addIdentifier('additionalAddress5.fullName')
        ;
    }
}