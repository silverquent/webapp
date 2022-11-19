<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, array('label' => "Prénon", 'required' => false,))
            ->add('username', TextType::class, array('label' => "Pseudo", 'required' => false,))
            ->add('lastname', TextType::class, array('label' => "Nom", 'required' => false,))
            ->add('email' , TextType::class ,array('label' => "Email" ,'required' => false,)) 
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Abonné' => 'ROLE_USER',
                    'Admin' => 'ROLE_ADMIN',                    
                ],
                'expanded'=>true,
                'multiple'=>true,
            ])
            ->add('description', TextareaType::class, array('label' => "Description de l'article", 'required' => false))
            ->add('images', FileType::class, [
                'label' => false,
                'multiple' => false,
                'mapped' => false,
                'required' => false,
            ]);;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
