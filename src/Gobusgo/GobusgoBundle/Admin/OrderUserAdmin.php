<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\ORM\EntityRepository;
use Gobusgo\GobusgoBundle\Entity\Address;
use Gobusgo\GobusgoBundle\Entity\Cargo;
use Gobusgo\GobusgoBundle\Entity\User;
use Gobusgo\GobusgoBundle\Form\CargoType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('edit')
            ->remove('show')
            ->remove('remove');

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

//            ->add('cargoId', CargoType::class, array(
//                'class'=>Cargo::class,
//                'compound'=>true,
////                'allow_add' => true,
//                'by_reference' => false,
////                'allow_delete' => true
//            ),array(
//                'admin_code' => 'admin.user.cargo'
//            ))
            ->add('cargoId', ModelListType::class, [
                'class'=>Cargo::class,
//                'property'=>'name',
//                'choices' => $cargo_available_choices
            ],array(
                'admin_code' => 'admin.user.cargo'
            ))
            ->add('price',null,array('label'=>'Цена'))
            ->add('quantityOfCargo')
            ->add('shippingAddress', ModelListType::class, [
                'class'=>Address::class,
//                'mapped'=>'name',
//                'choices' =>  $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('deliveryAddress', ModelListType::class, [
                'class'=>Address::class,
//                'property'=>'fullName',
//                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress1', ModelListType::class, [
                'class'=>Address::class,
//                'property'=>'fullName',
//                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress2', ModelListType::class, [
                'class'=>Address::class,
//                'property'=>'fullName',
//                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress3', ModelListType::class, [
                'class'=>Address::class,
//                'property'=>'fullName',
//                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress4', ModelListType::class, [
                'class'=>Address::class,
//                'property'=>'fullName',
//                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('additionalAddress5', ModelListType::class, [
                'class'=>Address::class,
//                'property'=>'fullName',
//                'choices' => $address_available_choices
            ],array(
                'admin_code' => 'admin.user.address'
            ))
            ->add('notice', TextareaType::class)

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
            ->add('shippingAddress.name')
            ->add('deliveryAddress.name')
            ->add('additionalAddress1.name')
            ->add('additionalAddress2.name')
            ->add('additionalAddress3.name')
            ->add('additionalAddress4.name')
            ->add('additionalAddress5.name')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('status', null, array('template' => '@GobusgoGobusgo/Admin/CRUD/list_boolean.html.twig'))
            ->addIdentifier('userId.fullName')
            ->addIdentifier('cargoId.name')
            ->addIdentifier('price')
            ->addIdentifier('quantityOfCargo')
            ->addIdentifier('shippingAddress.name')
            ->addIdentifier('deliveryAddress.name')
            ->addIdentifier('additionalAddress1.name')
            ->addIdentifier('additionalAddress2.name')
            ->addIdentifier('additionalAddress3.name')
            ->addIdentifier('additionalAddress4.name')
            ->addIdentifier('additionalAddress5.name')
        ;
    }
}