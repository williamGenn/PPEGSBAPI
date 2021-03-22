<?php

namespace App\Entity;

use App\Repository\LABORepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LABORepository::class)
 */
class labo
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
    private $LAB_CODE;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $LAB_NOM;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $LAB_CHEFVENTE;

    /**
     * @ORM\OneToMany(targetEntity=VISITEUR::class, mappedBy="departement")
     */
    private $Visiteurs;

    public function __construct()
    {
        $this->Visiteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLABCODE(): ?string
    {
        return $this->LAB_CODE;
    }

    public function setLABCODE(string $LAB_CODE): self
    {
        $this->LAB_CODE = $LAB_CODE;

        return $this;
    }

    public function getLABNOM(): ?string
    {
        return $this->LAB_NOM;
    }

    public function setLABNOM(?string $LAB_NOM): self
    {
        $this->LAB_NOM = $LAB_NOM;

        return $this;
    }

    public function getLABCHEFVENTE(): ?string
    {
        return $this->LAB_CHEFVENTE;
    }

    public function setLABCHEFVENTE(?string $LAB_CHEFVENTE): self
    {
        $this->LAB_CHEFVENTE = $LAB_CHEFVENTE;

        return $this;
    }

    /**
     * @return Collection|VISITEUR[]
     */
    public function getVisiteurs(): Collection
    {
        return $this->Visiteurs;
    }

    public function addVisiteur(VISITEUR $visiteur): self
    {
        if (!$this->Visiteurs->contains($visiteur)) {
            $this->Visiteurs[] = $visiteur;
            $visiteur->setDepartement($this);
        }

        return $this;
    }

    public function removeVisiteur(VISITEUR $visiteur): self
    {
        if ($this->Visiteurs->removeElement($visiteur)) {
            // set the owning side to null (unless already changed)
            if ($visiteur->getDepartement() === $this) {
                $visiteur->setDepartement(null);
            }
        }

        return $this;
    }
}
