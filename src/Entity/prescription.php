<?php

namespace App\Entity;

use App\Repository\prescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=prescriptionRepository::class)
 */
class prescription
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $posologie;

    /**
     * @ORM\ManyToOne(targetEntity=medicament::class, inversedBy="prescriptions")
     */
    private $medicaments;

    /**
     * @ORM\ManyToOne(targetEntity=typeIndividu::class)
     */
    private $type_individu;

    /**
     * @ORM\ManyToOne(targetEntity=dosage::class)
     */
    private $Dosage;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getPosologie(): ?string
    {
        return $this->posologie;
    }

    public function setPosologie(?string $posologie): self
    {
        $this->posologie = $posologie;

        return $this;
    }

    public function getMedicaments(): ?medicament
    {
        return $this->medicaments;
    }

    public function setMedicaments(?medicament $medicaments): self
    {
        $this->medicaments = $medicaments;

        return $this;
    }

    public function getTypeIndividu(): ?typeIndividu
    {
        return $this->type_individu;
    }

    public function setTypeIndividu(?typeIndividu $type_individu): self
    {
        $this->type_individu = $type_individu;

        return $this;
    }

    public function getDosage(): ?dosage
    {
        return $this->Dosage;
    }

    public function setDosage(?dosage $Dosage): self
    {
        $this->Dosage = $Dosage;

        return $this;
    }
}
