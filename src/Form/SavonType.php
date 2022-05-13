<?php

namespace App\Form;


use App\Entity\Huile;
use App\Entity\Savon;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SavonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',null,[
                'label'=>'Nom du savon'
            ])
            ->add('description')
            ->add('surgraissage')
            ->add('concentrationSoude')
            ->add('huiles',EntityType::class,[
                'label'=>'Huile',
                'class'=>Huile::class,
                'choice_label'=>'nom',
                'mapped'=>false
            ]);





    }

    public function configureOptions(OptionsResolver $resolver): void
    {/*
        $resolver->setDefaults([
            'data_class' => Savon::class,
        ]);*/

        $resolver->setDefaults(array(
            'data_class' => \App\Entity\Savon::class,
            'cascade_validation' => true
        ));


    }
}
