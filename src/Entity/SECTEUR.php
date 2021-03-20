<?php

namespace App\Entity;

use App\Repository\SECTEURRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SECTEURRepository::class)
 */
class SECTEUR
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
     * @ORM\OneToMany(targetEntity=VISITEUR::class, mappedBy="secteur")
     */
    private $responsables;

    /**
     * @ORM\OneToMany(targetEntity=REGION::class, mappedBy="SECTEUR")
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
     * @return Collection|VISITEUR[]
     */
    public function getResponsables(): Collection
    {
        return $this->responsables;
    }

    public function addResponsable(VISITEUR $responsable): self
    {
        if (!$this->responsables->contains($responsable)) {
            $this->responsables[] = $responsable;
            $responsable->setSecteur($this);
        }

        return $this;
    }

    public function removeResponsable(VISITEUR $responsable): self
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
     * @return Collection|REGION[]
     */
    public function getRegions(): Collection
    {
        return $this->regions;
    }

    public function addRegion(REGION $region): self
    {
        if (!$this->regions->contains($region)) {
            $this->regions[] = $region;
            $region->setSECTEUR($this);
        }

        return $this;
    }

    public function removeRegion(REGION $region): self
    {
        if ($this->regions->removeElement($region)) {
            // set the owning side to null (unless already changed)
            if ($region->getSECTEUR() === $this) {
                $region->setSECTEUR(null);
            }
        }

        return $this;
    }
}
