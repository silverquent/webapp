<?php

namespace App\Form;

use App\Entity\Calendar;
use App\Entity\Cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CalendarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('start', DateTimeType::class, array('label' => "Début",  'widget' => 'single_text','required' => true,))
            ->add('end', DateTimeType::class, array('label' => "Fin",  'widget' => 'single_text','required' => true,))
            
            
       
            ->add('cours', EntityType::class, array(
                'class' => Cours::class,
                'choice_label' => 'title',
                'multiple' => false,
                'required' => true,
                'label'=>'Catégorie',                
            ))   
          ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calendar::class,
        ]);
    }
}
