<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user_nom', TextType::class,['label' => 'Nom'])
            ->add('roles', ChoiceType::class, array(
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => array(
                  'Utilisateur' => 'ROLE_USER',
                  'Admin' => 'ROLE_ADMIN',
                ),
            ))
            ->add('email', TextType::class,['label' => 'Email'])
            ->add('user_login', TextType::class,['label' => 'Identifiant'])
            ->add('password', PasswordType::class,['label' => 'Mot de passe'])
            ->add('user_status',ChoiceType::class, array(
                'choices'  => array(
                    'Actif' => '1',
                    'Inactif' => '0',
                  
                ),
            ))
            ->add('user_image', FileType::class, [
                'label' => false,
                'multiple' => true,
                'mapped' => false,
                'required' => false
            ])
            ->add('user_type', ChoiceType::class, array(
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => array(
                  'Vendeur' => 'VENDEUR',
                ),
            ))
        ;

         // Data transformer
         $builder->get('roles')
         ->addModelTransformer(new CallbackTransformer(
             function ($rolesArray) {
                  // transform the array to a string
                  return count($rolesArray)? $rolesArray[0]: null;
             },
             function ($rolesString) {
                  // transform the string back to an array
                  return [$rolesString];
             }
     ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
