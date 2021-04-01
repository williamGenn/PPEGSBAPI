<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\presentationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=presentationRepository::class)
 */
class presentation
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
    private $PRE_CODE;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $PRE_LIBELLE;

    /**
     * @ORM\ManyToMany(targetEntity=medicament::class, mappedBy="presentations")
     */
    private $medicaments;

    public function __construct()
    {
        $this->medicaments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPRECODE(): ?string
    {
        return $this->PRE_CODE;
    }

    public function setPRECODE(string $PRE_CODE): self
    {
        $this->PRE_CODE = $PRE_CODE;

        return $this;
    }

    public function getPRELIBELLE(): ?string
    {
        return $this->PRE_LIBELLE;
    }

    public function setPRELIBELLE(?string $PRE_LIBELLE): self
    {
        $this->PRE_LIBELLE = $PRE_LIBELLE;

        return $this;
    }

    /**
     * @return Collection|medicament[]
     */
    public function getMedicaments(): Collection
    {
        return $this->medicaments;
    }

    public function addMedicament(medicament $medicament): self
    {
        if (!$this->medicaments->contains($medicament)) {
            $this->medicaments[] = $medicament;
            $medicament->addPresentation($this);
        }

        return $this;
    }

    public function removeMedicament(medicament $medicament): self
    {
        if ($this->medicaments->removeElement($medicament)) {
            $medicament->removePresentation($this);
        }

        return $this;
    }
}
