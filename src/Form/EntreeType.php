<?php

namespace App\Form;

use App\Entity\Entree;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntreeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('entr_date', DateType::class,['widget' => 'single_text'])
            ->add('entr_prix', TextType::class,['label' => 'Prix'])
            ->add('entr_quantite', TextType::class,['label' => 'Quantite'])
            ->add('produit')
            ->add('fournisseur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entree::class,
        ]);
    }
}
