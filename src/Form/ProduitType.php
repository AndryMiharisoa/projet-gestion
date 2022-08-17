<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pro_nom', TextType::class,['label' => 'Nom'])
            ->add('pro_prix', TextType::class,['label' => 'Prix'])
            ->add('pro_serial', TextType::class,['label' => 'Numero de série'])
            ->add('pro_date_peremption', DateType::class,['widget' => 'single_text'])
            ->add('pro_status',ChoiceType::class, array(
                'choices'  => array(
                    'Actif' => '1',
                    'Inactif' => '0',
                  
                ),
            ))
            ->add('categorie')

            ->add('image')
            ->add('pro_quantite')

            

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
