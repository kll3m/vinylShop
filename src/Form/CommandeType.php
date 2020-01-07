<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Commande;
use App\Entity\EtatCommande;
use App\Entity\MoyenPaiement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'pseudoCLient',
            ])
            ->add('moyenPaiement', EntityType::class,[
                'class' => MoyenPaiement::class,
                'choice_label' => 'libelleMoyenPaiement',
            ])
            ->add('etatCommande', EntityType::class, [
                'class' => EtatCommande::class,
                'choice_label' => 'libelleEtatCommande',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
