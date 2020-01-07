<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
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
    private $nomClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudoClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdpClient;




    /**
     * @ORM\Column(type="boolean")
     */
    private $roleClient;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commande", mappedBy="client")
     */
    private $commandeParClient;

    public function __construct()
    {
        $this->commandeParClient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): self
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getTelClient(): ?string
    {
        return $this->telClient;
    }

    public function setTelClient(string $telClient): self
    {
        $this->telClient = $telClient;

        return $this;
    }

    public function getMailClient(): ?string
    {
        return $this->mailClient;
    }

    public function setMailClient(string $mailClient): self
    {
        $this->mailClient = $mailClient;

        return $this;
    }

    public function getAdresseClient(): ?string
    {
        return $this->adresseClient;
    }

    public function setAdresseClient(string $adresseClient): self
    {
        $this->adresseClient = $adresseClient;

        return $this;
    }

    public function getPseudoClient(): ?string
    {
        return $this->pseudoClient;
    }

    public function setPseudoClient(string $pseudoClient): self
    {
        $this->pseudoClient = $pseudoClient;

        return $this;
    }

    public function getMdpClient(): ?string
    {
        return $this->mdpClient;
    }

    public function setMdpClient(string $mdpClient): self
    {
        $this->mdpClient = $mdpClient;

        return $this;
    }





    public function getRoleClient(): ?bool
    {
        return $this->roleClient;
    }

    public function setRoleClient(bool $roleClient): self
    {
        $this->roleClient = $roleClient;

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
            $commande->setClient($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getClient() === $this) {
                $commande->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandeParClient(): Collection
    {
        return $this->commandeParClient;
    }

    public function addCommandeParClient(Commande $commandeParClient): self
    {
        if (!$this->commandeParClient->contains($commandeParClient)) {
            $this->commandeParClient[] = $commandeParClient;
            $commandeParClient->setClient($this);
        }

        return $this;
    }

    public function removeCommandeParClient(Commande $commandeParClient): self
    {
        if ($this->commandeParClient->contains($commandeParClient)) {
            $this->commandeParClient->removeElement($commandeParClient);
            // set the owning side to null (unless already changed)
            if ($commandeParClient->getClient() === $this) {
                $commandeParClient->setClient(null);
            }
        }

        return $this;
    }
}
