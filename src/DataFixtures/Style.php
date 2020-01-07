<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\EtatCommande;
use App\Entity\MoyenPaiement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Style extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=1;$i<=20; $i++) {
            $nom="Style $i";

            $style = new \App\Entity\Style();
            $style->setNomStyle($nom);
            $manager->persist($style);
            $x=rand(1,10);
            for($z=0;$z<$x;$z++){
                $artiste = new \App\Entity\Artiste();
                $artiste->setNomArtiste("Artiste$i$z");
                $artiste->setStyle($style);
                $manager->persist($artiste);
                $nbalbum = rand(1,5);
                for ($q=0;$q<$nbalbum;$q++){
                    $album = new Album();
                    $album->setArtiste($artiste);
                    $album->setPrixAlbum(19.99);
                    $album->setAnneeAlbum('2020');
                    $album->setNomAlbum("Album$z$q$i");
                    $album->setStockAlbum(10);
                    $manager->persist($album);
                }
            }
        }

        $moyPaiement1 = new MoyenPaiement();
        $moyPaiement1->setLibelleMoyenPaiement('CB');
        $moyPaiement2 = new MoyenPaiement();
        $moyPaiement2->setLibelleMoyenPaiement('Paypal');
        $manager->persist($moyPaiement1);
        $manager->persist($moyPaiement2);

        $etat1 = new EtatCommande();
        $etat1->setEtatCommande('En cours de traitement');
        $etat2 = new EtatCommande();
        $etat2->setEtatCommande('Expédiée');
        $etat3 = new EtatCommande();
        $etat3->setEtatCommande('Livrée');
        $manager->persist($etat1);
        $manager->persist($etat2);
        $manager->persist($etat3);

        $manager->flush();
    }
}
