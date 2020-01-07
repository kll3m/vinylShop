<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="commandeParClient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MoyenPaiement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $moyenPaiement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EtatCommande", inversedBy="etatParCommande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etatCommande;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getMoyenPaiement(): ?MoyenPaiement
    {
        return $this->moyenPaiement;
    }

    public function setMoyenPaiement(?MoyenPaiement $moyenPaiement): self
    {
        $this->moyenPaiement = $moyenPaiement;

        return $this;
    }

    public function getEtatCommande(): ?EtatCommande
    {
        return $this->etatCommande;
    }

    public function setEtatCommande(?EtatCommande $etatCommande): self
    {
        $this->etatCommande = $etatCommande;

        return $this;
    }


}
