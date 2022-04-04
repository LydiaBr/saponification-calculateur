<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Huile;
use App\Entity\Savon;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('huile',EntityType::class,[
                'label'=>'huile',
                'class'=>Huile::class,
                'choice_label'=>'name'
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Savon::class,
        ]);
    }
}
