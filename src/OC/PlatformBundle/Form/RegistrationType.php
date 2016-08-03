<?php

namespace OC\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder->add('nom')
        ->add('prenom')
        ->add('sexe', ChoiceType::class, array(
            'choices' => array(
                'Homme' => 'Homme',
                'Femme' => 'Femme'
            ),
            'required'    => true,
            'placeholder' => 'Selectionnez votre sexe',
            'empty_data'  => null))
        ->add('date_naissance', DateType::class, array(
            'widget' => 'single_text',
            'attr' => ['class' => 'datepicker'],
            'format' =>'dd/MM/yyyy',))
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