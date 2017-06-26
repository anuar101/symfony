<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface$builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Full Name', 
                'required'   => true
            ))
            ->add('age', IntegerType::class, array(
                'label' => 'Age',
                'required'   => true
            ))
            ->add('remarks', TextareaType::class, array(
                'label' => 'Remarks',
                'required'   => true
            ))
            /*->add('email', EmailType::class, array(
                'label' => 'Email',
                'required'   => true
            ))
            ->add('birthdate', BirthdayType::class, array(
                'label' => 'Email',
                'required'   => true,
                'placeholder' => array(
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                )
            ))*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data-class' => 'AppBundle\Entity\User'
        ));
    }
}