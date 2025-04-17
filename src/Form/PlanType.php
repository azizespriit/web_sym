<?php 
namespace App\Form;

use App\Entity\Plan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Jour', ChoiceType::class, [
            'label' => 'Jour de la semaine',
            'choices' => [
                'Lundi' => 'Lundi',
                'Mardi' => 'Mardi',
                'Mercredi' => 'Mercredi',
                'Jeudi' => 'Jeudi',
                'Vendredi' => 'Vendredi',
                'Samedi' => 'Samedi',
                'Dimanche' => 'Dimanche',
            ],
            'placeholder' => 'Choisissez un jour',
            'attr' => ['class' => 'form-control'],
        ])
            ->add('Nutration', TextType::class, [
                'label' => 'Plan nutritionnel',
                'attr' => ['class' => 'form-control']
            ])
            ->add('Muscle', TextType::class, [
                'label' => 'Groupe musculaire ciblé',
                'attr' => ['class' => 'form-control']
            ])
            ->add('Course', NumberType::class, [
                'label' => 'Distance de course (km)',
                'attr' => ['class' => 'form-control', 'step' => '0.1']
            ]);
            
     
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plan::class,
            'hide_objectif_field' => false // Option personnalisée
        ]);
    }
}
?>