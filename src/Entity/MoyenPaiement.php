<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MoyenPaiementRepository")
 */
class MoyenPaiement
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
    private $libelleMoyenPaiement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleMoyenPaiement(): ?string
    {
        return $this->libelleMoyenPaiement;
    }

    public function setLibelleMoyenPaiement(string $libelleMoyenPaiement): self
    {
        $this->libelleMoyenPaiement = $libelleMoyenPaiement;

        return $this;
    }
}
