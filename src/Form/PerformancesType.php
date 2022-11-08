<?php

namespace App\Form;

use App\Entity\Exercices;
use App\Entity\Performances;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PerformancesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('resultat', TextType::class, array('label' => "Résultat", 'required' => true,))            
            ->add('exercice', EntityType::class, array(
                'class' => Exercices::class,
                'choice_label' => 'name',
                'multiple' => false,
                'required' => true,
                'label' => 'Utilisateur',
            ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Performances::class,
        ]);
    }
}
