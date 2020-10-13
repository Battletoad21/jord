<?php

namespace App\Form;

use App\Entity\HikeSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HikeSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('difficulty', null, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Difficulté souhaité'
                ]
            ])
            ->add('postalCode', null, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Code Postal'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HikeSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
