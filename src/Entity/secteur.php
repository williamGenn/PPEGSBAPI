<?php

namespace App\Entity;

use App\Repository\secteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=secteurRepository::class)
 */
class secteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $SEC_CODE;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $SEC_LIBELLE;

    /**
     * @ORM\OneToMany(targetEntity=visiteur::class, mappedBy="secteur")
     */
    private $responsables;

    /**
     * @ORM\OneToMany(targetEntity=region::class, mappedBy="secteur")
     */
    private $regions;

    public function __construct()
    {
        $this->responsables = new ArrayCollection();
        $this->regions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSECCODE(): ?string
    {
        return $this->SEC_CODE;
    }

    public function setSECCODE(string $SEC_CODE): self
    {
        $this->SEC_CODE = $SEC_CODE;

        return $this;
    }

    public function getSECLIBELLE(): ?string
    {
        return $this->SEC_LIBELLE;
    }

    public function setSECLIBELLE(?string $SEC_LIBELLE): self
    {
        $this->SEC_LIBELLE = $SEC_LIBELLE;

        return $this;
    }

    /**
     * @return Collection|visiteur[]
     */
    public function getResponsables(): Collection
    {
        return $this->responsables;
    }

    public function addResponsable(visiteur $responsable): self
    {
        if (!$this->responsables->contains($responsable)) {
            $this->responsables[] = $responsable;
            $responsable->setSecteur($this);
        }

        return $this;
    }

    public function removeResponsable(visiteur $responsable): self
    {
        if ($this->responsables->removeElement($responsable)) {
            // set the owning side to null (unless already changed)
            if ($responsable->getSecteur() === $this) {
                $responsable->setSecteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|region[]
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(region $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
            $region->setsecteur($this);
        }

        return $this;
    }

    public function removeRegion(region $region): self
    {
        if ($this->regions->removeElement($region)) {
            // set the owning side to null (unless already changed)
            if ($region->getsecteur() === $this) {
                $region->setsecteur(null);
            }
        }

        return $this;
    }
}
