<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlbumRepository")
 */
class Album
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
    private $nomAlbum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anneeAlbum;

    /**
     * @ORM\Column(type="float")
     */
    private $prixAlbum;


    /**
     * @ORM\Column(type="integer")
     */
    private $stockAlbum;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artiste", inversedBy="albums")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artiste;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAlbum(): ?string
    {
        return $this->nomAlbum;
    }

    public function setNomAlbum(string $nomAlbum): self
    {
        $this->nomAlbum = $nomAlbum;

        return $this;
    }

    public function getAnneeAlbum(): ?string
    {
        return $this->anneeAlbum;
    }

    public function setAnneeAlbum(string $anneeAlbum): self
    {
        $this->anneeAlbum = $anneeAlbum;

        return $this;
    }

    public function getPrixAlbum(): ?float
    {
        return $this->prixAlbum;
    }

    public function setPrixAlbum(float $prixAlbum): self
    {
        $this->prixAlbum = $prixAlbum;

        return $this;
    }


    public function getStockAlbum(): ?int
    {
        return $this->stockAlbum;
    }

    public function setStockAlbum(int $stockAlbum): self
    {
        $this->stockAlbum = $stockAlbum;

        return $this;
    }

    public function getArtiste(): ?Artiste
    {
        return $this->artiste;
    }

    public function setArtiste(?Artiste $artiste): self
    {
        $this->artiste = $artiste;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->name;
    }


}
