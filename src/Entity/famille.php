<?php

namespace App\Entity;

use App\Repository\familleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=familleRepository::class)
 */
class famille
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
    private $FAM_CODE;

    /**
     * @ORM\Column(type="string", length=80, nullable=true)
     */
    private $FAM_LIBELLE;

    /**
     * @ORM\OneToMany(targetEntity=medicament::class, mappedBy="famille")
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

    public function getFAMCODE(): ?string
    {
        return $this->FAM_CODE;
    }

    public function setFAMCODE(string $FAM_CODE): self
    {
        $this->FAM_CODE = $FAM_CODE;

        return $this;
    }

    public function getFAMLIBELLE(): ?string
    {
        return $this->FAM_LIBELLE;
    }

    public function setFAMLIBELLE(?string $FAM_LIBELLE): self
    {
        $this->FAM_LIBELLE = $FAM_LIBELLE;

        return $this;
    }

    /**
     * @return Collection|medicament[]
     */
    public function getmedicaments(): Collection
    {
        return $this->medicaments;
    }

    public function addmedicament(medicament $medicament): self
    {
        if (!$this->medicaments->contains($medicament)) {
            $this->medicaments[] = $medicament;
            $medicament->setfamille($this);
        }

        return $this;
    }

    public function removemedicament(medicament $medicament): self
    {
        if ($this->medicaments->removeElement($medicament)) {
            // set the owning side to null (unless already changed)
            if ($medicament->getfamille() === $this) {
                $medicament->setfamille(null);
            }
        }

        return $this;
    }
}
