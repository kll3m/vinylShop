<?php

namespace App\Form;

use App\Entity\Comporter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ComporterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('qteCommandeAlbum')
            ->add('idAlbum')
            ->add('album')
            ->add('commande')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comporter::class,
        ]);
    }
}
