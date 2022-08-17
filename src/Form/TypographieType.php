<?php

namespace App\Form;

use App\Entity\Typographie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypographieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typo_groupe', TextType::class,['label' => 'Groupe'])
            ->add('typo_libelle', TextType::class,['label' => 'Libellé'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Typographie::class,
        ]);
    }
}
