<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtatCommandeRepository")
 */
class EtatCommande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleEtatCommande;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="etatCommande")
     */
    private $etatParCommande;

    public function __construct()
    {

        $this->etatParCommande = new ArrayCollection();
    }





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleEtatCommande(): ?string
    {
        return $this->libelleEtatCommande;
    }

    public function setLibelleEtatCommande(string $libelleEtatCommande): self
    {
        $this->libelleEtatCommande = $libelleEtatCommande;

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setEtatCommande($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getEtatCommande() === $this) {
                $commande->setEtatCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getEtatParCommande(): Collection
    {
        return $this->etatParCommande;
    }

    public function addEtatParCommande(Commande $etatParCommande): self
    {
        if (!$this->etatParCommande->contains($etatParCommande)) {
            $this->etatParCommande[] = $etatParCommande;
            $etatParCommande->setEtatCommande($this);
        }

        return $this;
    }

    public function removeEtatParCommande(Commande $etatParCommande): self
    {
        if ($this->etatParCommande->contains($etatParCommande)) {
            $this->etatParCommande->removeElement($etatParCommande);
            // set the owning side to null (unless already changed)
            if ($etatParCommande->getEtatCommande() === $this) {
                $etatParCommande->setEtatCommande(null);
            }
        }

        return $this;
    }


}
