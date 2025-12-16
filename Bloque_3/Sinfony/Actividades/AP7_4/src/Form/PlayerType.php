<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nombre',
                'constraints' => [
                        new NotBlank(),
                        new Length(min: 3),
                ],
            ])
            ->add('lastName' , TextType::class, ['label' => 'Apellido',
                'constraints' => [
                    new NotBlank(),
                    new Length(min: 3),
                ],
            ])
            ->add('age' , RangeType::class, ['label' => 'Edad',   'constraints' => [
                'GreaterThanOrEqual' => new GreaterThanOrEqual(18),
                ],])
            ->add('team' , ChoiceType::class, ['label' => 'Equipos disponibles',
                'choices' => [
                'pepe' => 'Pepe',
                'Sara'=>'Sara',
                ],
            ])
            ->add('goals' , TextType::class, ['label' => 'Goles',
                'constraints' => [
                'GreaterThanOrEqual' => new GreaterThanOrEqual(0),
                ],
                ])
            ->add('cards', TextType::class, ['label' => 'Tarjetas',
                'constraints' => [
                    'GreaterThanOrEqual' => new GreaterThanOrEqual(0),
                ],])
            ->add('birthDate' , DateType::class, ['label' => 'Fecha de nacimiento', 'widget' => 'single_text', 'format' => 'yyyy-MM-dd'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
