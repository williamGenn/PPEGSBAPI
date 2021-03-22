<?php

namespace App\Entity;

use App\Repository\PRESCRIPTIONRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PRESCRIPTIONRepository::class)
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
     * @ORM\ManyToOne(targetEntity=MEDICAMENT::class, inversedBy="PRESCRIPTIONs")
     */
    private $medicaments;

    /**
     * @ORM\ManyToOne(targetEntity=TYPEINDIVIDU::class)
     */
    private $type_individu;

    /**
     * @ORM\ManyToOne(targetEntity=DOSAGE::class)
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

    public function getMedicaments(): ?MEDICAMENT
    {
        return $this->medicaments;
    }

    public function setMedicaments(?MEDICAMENT $medicaments): self
    {
        $this->medicaments = $medicaments;

        return $this;
    }

    public function getTypeIndividu(): ?TYPEINDIVIDU
    {
        return $this->type_individu;
    }

    public function setTypeIndividu(?TYPEINDIVIDU $type_individu): self
    {
        $this->type_individu = $type_individu;

        return $this;
    }

    public function getDosage(): ?DOSAGE
    {
        return $this->Dosage;
    }

    public function setDosage(?DOSAGE $Dosage): self
    {
        $this->Dosage = $Dosage;

        return $this;
    }
}
