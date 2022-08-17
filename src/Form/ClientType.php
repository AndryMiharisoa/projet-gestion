<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cli_nom', TextType::class,['label' => 'Nom et prénom(s)'])
            ->add('cli_contact', TextType::class,['label' => 'Contact'])
            ->add('cli_adresse', TextType::class,['label' => 'Adresse'])
            ->add('cli_mail', TextType::class,['label' => 'Email'])
            ->add('cli_observation', TextType::class,['label' => 'Observation'])
            ->add('cli_type', TextType::class,['label' => 'Type'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
