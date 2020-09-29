<?php

namespace App\Form;

use App\Entity\Hike;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('time')
            ->add('distance')
            ->add('positive_climb')
            ->add('negative_climb')
            ->add('difficulty')
            ->add('city')
            ->add('postal_code')
            ->add('start_lat')
            ->add('start_lng')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hike::class,
        ]);
    }
}
