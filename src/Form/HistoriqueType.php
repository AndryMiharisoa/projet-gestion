<?php

namespace App\Form;

use App\Entity\Historique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HistoriqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('histo_ref_externe', TextType::class,['label' => 'Référence'])
            ->add('histo_date')
            ->add('histo_type', TextType::class,['label' => 'Type'])
            ->add('histo_valeur', TextType::class,['label' => 'Valeur'])
            ->add('histo_observation', TextType::class,['label' => 'Observation'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Historique::class,
        ]);
    }
}
