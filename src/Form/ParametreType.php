<?php

namespace App\Form;

use App\Entity\Parametre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParametreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('param_code', TextType::class,['label' => 'Code'])
            ->add('param_site', TextType::class,['label' => 'Site'])
            ->add('param_smtp', TextType::class,['label' => 'Smtp'])
            ->add('param_mdp', TextType::class,['label' => 'Mot de passe'])
            ->add('param_actif', TextType::class,['label' => 'Actif'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Parametre::class,
        ]);
    }
}
