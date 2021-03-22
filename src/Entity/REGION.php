<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\regionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=regionRepository::class)
 */
class region
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $REG_CODE;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $REG_NOM;

    /**
     * @ORM\ManyToOne(targetEntity=secteur::class, inversedBy="regions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $secteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getREGCODE(): ?string
    {
        return $this->REG_CODE;
    }

    public function setREGCODE(string $REG_CODE): self
    {
        $this->REG_CODE = $REG_CODE;

        return $this;
    }

    public function getREGNOM(): ?string
    {
        return $this->REG_NOM;
    }

    public function setREGNOM(?string $REG_NOM): self
    {
        $this->REG_NOM = $REG_NOM;

        return $this;
    }

    public function getsecteur(): ?secteur
    {
        return $this->secteur;
    }

    public function setsecteur(?secteur $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }
}
