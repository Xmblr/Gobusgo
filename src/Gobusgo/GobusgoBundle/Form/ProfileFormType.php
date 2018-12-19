<?php

namespace Gobusgo\GobusgoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProfileFormType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options)

    {
        $builder
            ->add('organization', null, array('attr'=>array('readonly'=>'true')))
            ->add('UNP', null, array('attr'=>array('readonly'=>'true')))
            ->add('bank', null, array('attr'=>array('readonly'=>'true')))
            ->add('addressOfTheBank', null, array('attr'=>array('readonly'=>'true')))
            ->add('legalAddress', null, array('attr'=>array('readonly'=>'true')))
            ->add('settlementAccount', null, array('attr'=>array('readonly'=>'true')))
            ->add('code', null, array('attr'=>array('readonly'=>'true')))
            ->add('phone', null)//can be edited
            ->add('fullName', null)//can be edited
            ->add('contractNumber', null, array('attr'=>array('readonly'=>'true')))
        ;
    }

    public function getParent()

    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()

    {
        return 'app_user_profile';
    }

    public function getName()

    {
        return $this->getBlockPrefix();
    }

}