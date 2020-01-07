<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComporterRepository")
 */
class Comporter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $qteCommandeAlbum;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Album")
     */
    private $idAlbum;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Album", inversedBy="comporters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $album;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    public function __construct()
    {
        $this->idAlbum = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteCommandeAlbum(): ?string
    {
        return $this->qteCommandeAlbum;
    }

    public function setQteCommandeAlbum(string $qteCommandeAlbum): self
    {
        $this->qteCommandeAlbum = $qteCommandeAlbum;

        return $this;
    }

    /**
     * @return Collection|Album[]
     */
    public function getIdAlbum(): Collection
    {
        return $this->idAlbum;
    }

    public function addIdAlbum(Album $idAlbum): self
    {
        if (!$this->idAlbum->contains($idAlbum)) {
            $this->idAlbum[] = $idAlbum;
        }

        return $this;
    }

    public function removeIdAlbum(Album $idAlbum): self
    {
        if ($this->idAlbum->contains($idAlbum)) {
            $this->idAlbum->removeElement($idAlbum);
        }

        return $this;
    }


    public function getAlbum(): ?Album
    {
        return $this->album;
    }

    public function setAlbum(?Album $album): self
    {
        $this->album = $album;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }
}
