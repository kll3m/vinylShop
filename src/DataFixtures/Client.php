<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Client extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nom = "nomFixture";
        $prenom = "prenomFixture";
        $tel = "0652148798";
        $mail = "mailFixture";
        $adresse = "adresseFixture";
        $pseudo = "pseudoFixture";
        $mdp = "mdpFixture";
        $role = true;

        for ($i=0; $i<20; $i++) {
            $client = new \App\Entity\Client();
            $client->setNomClient($nom);
            $client->setPrenomClient($prenom);
            $client->setTelClient($tel);
            $client->setMailClient($mail);
            $client->setAdresseClient($adresse);
            $client->setPseudoClient($pseudo);
            $client->setMdpClient($mdp);
            if($i%2==0) {
                $role = true;
            }else{
                $role = false;
            }
            $client->setRoleClient($role);
            $manager->persist($client);
        }
        $manager->flush();
    }
}
