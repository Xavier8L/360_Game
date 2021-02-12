<?php

namespace App\Form;

use App\Entity\Spel;
use App\Entity\Speler;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpelerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam')
            ->add('leeftijd')
            ->add('spel', EntityType::class,
                [
                    'class' => Spel::class,
                    'choice_label' => 'naam'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Speler::class,
        ]);
    }
}
