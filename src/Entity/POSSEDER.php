<?php

namespace App\Entity;

use App\Repository\POSSEDERRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=POSSEDERRepository::class)
 */
class POSSEDER
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $Diplome;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $CoeffPrescription;

    /**
     * @ORM\ManyToOne(targetEntity=SPECIALITE::class)
     */
    private $specialite;

    /**
     * @ORM\OneToMany(targetEntity=PRATICIEN::class, mappedBy="displomes")
     */
    private $praticien;

    public function __construct()
    {
        $this->praticien = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiplome(): ?string
    {
        return $this->Diplome;
    }

    public function setDiplome(?string $Diplome): self
    {
        $this->Diplome = $Diplome;

        return $this;
    }

    public function getCoeffPrescription(): ?float
    {
        return $this->CoeffPrescription;
    }

    public function setCoeffPrescription(?float $CoeffPrescription): self
    {
        $this->CoeffPrescription = $CoeffPrescription;

        return $this;
    }

    public function getSpecialite(): ?SPECIALITE
    {
        return $this->specialite;
    }

    public function setSpecialite(?SPECIALITE $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * @return Collection|PRATICIEN[]
     */
    public function getPraticien(): Collection
    {
        return $this->praticien;
    }

    public function addPraticien(PRATICIEN $praticien): self
    {
        if (!$this->praticien->contains($praticien)) {
            $this->praticien[] = $praticien;
            $praticien->setDisplomes($this);
        }

        return $this;
    }

    public function removePraticien(PRATICIEN $praticien): self
    {
        if ($this->praticien->removeElement($praticien)) {
            // set the owning side to null (unless already changed)
            if ($praticien->getDisplomes() === $this) {
                $praticien->setDisplomes(null);
            }
        }

        return $this;
    }
}
