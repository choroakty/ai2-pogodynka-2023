<?php

namespace App\Form;

use App\Entity\Forecast;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ForecastType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('celsius', NumberType::class, [
                'html5' => true,
            ])
            ->add('wind', NumberType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 1000,
                ],
                'scale' => 2,
                'html5' => true,
            ])
            ->add('pressure', NumberType::class, [
                'attr' => [
                    'min' => 850,
                    'max' => 1100,
                ],
                'html5' => true,
            ])
            ->add('rain', NumberType::class, [
                'html5' => true,
            ])
            ->add('is_party_time', CheckboxType::class, [
                'label' => 'Is party time?',
                'required' => false,
            ])
            ->add('city', EntityType::class, [
                'class' => 'App\Entity\City',
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Forecast::class,
        ]);
    }
}
