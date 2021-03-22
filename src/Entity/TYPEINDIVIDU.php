<?php

namespace App\Entity;

use App\Repository\TYPEINDIVIDURepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TYPEINDIVIDURepository::class)
 */
class typeIndividu
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
    private $TIN_CODE;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $TIN_LIBELLE;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTINCODE(): ?string
    {
        return $this->TIN_CODE;
    }

    public function setTINCODE(string $TIN_CODE): self
    {
        $this->TIN_CODE = $TIN_CODE;

        return $this;
    }

    public function getTINLIBELLE(): ?string
    {
        return $this->TIN_LIBELLE;
    }

    public function setTINLIBELLE(?string $TIN_LIBELLE): self
    {
        $this->TIN_LIBELLE = $TIN_LIBELLE;

        return $this;
    }
}
