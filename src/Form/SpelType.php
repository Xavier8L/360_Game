<?php

namespace App\Form;

use App\Entity\Spel;
use App\Entity\Speler;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('naam')
            ->add('type')
            ->add('speler', EntityType::class,
                [
                    'class' => Speler::class,
                    'choice_label' => 'naam'
                ])



        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Spel::class,
        ]);
    }
}
