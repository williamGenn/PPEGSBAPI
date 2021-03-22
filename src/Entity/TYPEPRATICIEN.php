<?php

namespace App\Entity;

use App\Repository\TYPEPRATICIENRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TYPEPRATICIENRepository::class)
 */
class typePraticien
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $TYP_CODE;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $TYP_LIBELLE;

    /**
     * @ORM\Column(type="string", length=35, nullable=true)
     */
    private $TYP_LIEU;

    /**
     * @ORM\OneToMany(targetEntity=PRATICIEN::class, mappedBy="type")
     */
    private $PRATICIENs;

    public function __construct()
    {
        $this->PRATICIENs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTYPCODE(): ?string
    {
        return $this->TYP_CODE;
    }

    public function setTYPCODE(string $TYP_CODE): self
    {
        $this->TYP_CODE = $TYP_CODE;

        return $this;
    }

    public function getTYPLIBELLE(): ?string
    {
        return $this->TYP_LIBELLE;
    }

    public function setTYPLIBELLE(?string $TYP_LIBELLE): self
    {
        $this->TYP_LIBELLE = $TYP_LIBELLE;

        return $this;
    }

    public function getTYPLIEU(): ?string
    {
        return $this->TYP_LIEU;
    }

    public function setTYPLIEU(?string $TYP_LIEU): self
    {
        $this->TYP_LIEU = $TYP_LIEU;

        return $this;
    }

    /**
     * @return Collection|PRATICIEN[]
     */
    public function getPRATICIENs(): Collection
    {
        return $this->PRATICIENs;
    }

    public function addPRATICIEN(PRATICIEN $pRATICIEN): self
    {
        if (!$this->PRATICIENs->contains($pRATICIEN)) {
            $this->PRATICIENs[] = $pRATICIEN;
            $pRATICIEN->setType($this);
        }

        return $this;
    }

    public function removePRATICIEN(PRATICIEN $pRATICIEN): self
    {
        if ($this->PRATICIENs->removeElement($pRATICIEN)) {
            // set the owning side to null (unless already changed)
            if ($pRATICIEN->getType() === $this) {
                $pRATICIEN->setType(null);
            }
        }

        return $this;
    }
}
