<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StyleRepository")
 */
class Style
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
    private $nomStyle;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Artiste", mappedBy="style")
     */
    private $artistes;

    public function __construct()
    {

        $this->artistes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomStyle(): ?string
    {
        return $this->nomStyle;
    }

    public function setNomStyle(string $nomStyle): self
    {
        $this->nomStyle = $nomStyle;

        return $this;
    }

    /**
     * @return Collection|Artiste[]
     */
    public function getArtistes(): Collection
    {
        return $this->artistes;
    }

    public function addArtiste(Artiste $artiste): self
    {
        if (!$this->artistes->contains($artiste)) {
            $this->artistes[] = $artiste;
            $artiste->setStyle($this);
        }

        return $this;
    }

    public function removeArtiste(Artiste $artiste): self
    {
        if ($this->artistes->contains($artiste)) {
            $this->artistes->removeElement($artiste);
            // set the owning side to null (unless already changed)
            if ($artiste->getStyle() === $this) {
                $artiste->setStyle(null);
            }
        }

        return $this;
    }


}
