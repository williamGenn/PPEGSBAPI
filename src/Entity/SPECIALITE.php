<?php

namespace App\Entity;

use App\Repository\specialiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=specialiteRepository::class)
 */
class specialite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $SPE_CODE;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $SPE_LIBELLE;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSPECODE(): ?string
    {
        return $this->SPE_CODE;
    }

    public function setSPECODE(string $SPE_CODE): self
    {
        $this->SPE_CODE = $SPE_CODE;

        return $this;
    }

    public function getSPELIBELLE(): ?string
    {
        return $this->SPE_LIBELLE;
    }

    public function setSPELIBELLE(string $SPE_LIBELLE): self
    {
        $this->SPE_LIBELLE = $SPE_LIBELLE;

        return $this;
    }
}
