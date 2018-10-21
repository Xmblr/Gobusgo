<?php
/**
 * Created by PhpStorm.
 * User: sambo
 * Date: 21.04.2018
 * Time: 19:57
 */

namespace Gobusgo\GobusgoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class IndividualCallType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('phone', NumberType::class)
            ->add('weight')
            ->add('sum')
            ->add('cities')
            ->add('notice', TextareaType::class, array(
                'required' => false,
                'empty_data' => 'Не задано',
            ))
            ;
    }
}