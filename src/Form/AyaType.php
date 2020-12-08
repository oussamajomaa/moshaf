<?php

namespace App\Form;

use App\Entity\Aya;
use App\Entity\Soura;
use App\Repository\SouraRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AyaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class, [
                'label' => false
            ])
            ->add('number',IntegerType::class, [
                'label' => false,
                'attr'  => [
                    'min'   => 1
                    
                ]
            ])
            ->add('soura', EntityType::class, [
                'label' => false,
                'class' => Soura::class,
                'query_builder' => function (SouraRepository $er) {
                    return $er->createQueryBuilder('u')
                    ->where('u.id = 10');
                }
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Aya::class,
        ]);
    }
}
