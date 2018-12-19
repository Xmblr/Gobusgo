<?php

namespace Gobusgo\GobusgoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options)

    {
        $builder
            ->add('organization', null)
            ->add('UNP', null)
            ->add('bank', null)
            ->add('addressOfTheBank', null)
            ->add('legalAddress', null)
            ->add('settlementAccount', null)
            ->add('code', null)
            ->add('phone', null)
            ->add('fullName', null)
            ->add('contractNumber', null)
            ;
    }

    public function getParent()

    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()

    {
        return 'app_user_registration';
    }

    public function getName()

    {
        return $this->getBlockPrefix();
    }

}