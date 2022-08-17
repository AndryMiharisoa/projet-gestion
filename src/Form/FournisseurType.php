<?php

namespace App\Form;

use App\Entity\Fournisseur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FournisseurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('frn_nom', TextType::class,['label' => 'Nom et prénom(s)'])
            ->add('frn_contact', TextType::class,['label' => 'Contact'])
            ->add('frn_adresse', TextType::class,['label' => 'Adresse'])
            ->add('frn_mail', TextType::class,['label' => 'Email'])
            ->add('frn_observation', TextType::class,['label' => 'Observation'])
            ->add('frn_type', TextType::class,['label' => 'Type'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fournisseur::class,
        ]);
    }
}
