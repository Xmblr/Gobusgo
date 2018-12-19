<?php

namespace Gobusgo\GobusgoBundle\Admin;

use Gobusgo\GobusgoBundle\Entity\City;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class AddressUserAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'address_user';
    protected $baseRoutePattern = 'address_user';

//    public function configure()
//    {
//        parent::configure();
//        $this->classnameLabel = 'Адреса';
//    }


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


    public function preRemove($object)
    {
//TODO: Сделать проверку, используется ли объект
        $this->getConfigurationPool()->getContainer()->get('session')->getFlashBag()->add(
            'warning',
            'Неовозможно удалить этот элемент, он используется.'
        );
        $redirection = new RedirectResponse($this->getConfigurationPool()->getContainer()->get('router')->generate('address_user_list'));
        $redirection->send();
    }

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
            ->add('city.name', null,array('label'=>'Город'))
            ->add('street', null, array('label' => 'Адрес'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {

        unset($this->listModes['mosaic']);

        $listMapper
            ->add('_action', null, [
                'label'=>'Действия',
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