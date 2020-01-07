<?php

namespace App\Form;

use App\Entity\Album;
use App\Entity\Artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlbumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomAlbum')
            ->add('anneeAlbum')
            ->add('prixAlbum')
            ->add('stockAlbum')
            ->add('artiste', EntityType::class, [
                'class' => Artiste::class,
                'choice_label' => 'nomArtiste',

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Album::class,
        ]);
    }
}
