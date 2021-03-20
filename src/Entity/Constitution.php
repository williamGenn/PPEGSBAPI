<?php

namespace App\Entity;

use App\Repository\ConstitutionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConstitutionRepository::class)
 */
class Constitution
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantité;

    /**
     * @ORM\OneToMany(targetEntity=MEDICAMENT::class, mappedBy="constitution")
     */
    private $medicaments;

    /**
     * @ORM\ManyToMany(targetEntity=COMPOSANT::class, inversedBy="constitutions")
     */
    private $composants;

    public function __construct()
    {
        $this->medicaments = new ArrayCollection();
        $this->composants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantité(): ?int
    {
        return $this->Quantité;
    }

    public function setQuantité(int $Quantité): self
    {
        $this->Quantité = $Quantité;

        return $this;
    }

    /**
     * @return Collection|MEDICAMENT[]
     */
    public function getMedicaments(): Collection
    {
        return $this->medicaments;
    }

    public function addMedicament(MEDICAMENT $medicament): self
    {
        if (!$this->medicaments->contains($medicament)) {
            $this->medicaments[] = $medicament;
            $medicament->setConstitution($this);
        }

        return $this;
    }

    public function removeMedicament(MEDICAMENT $medicament): self
    {
        if ($this->medicaments->removeElement($medicament)) {
            // set the owning side to null (unless already changed)
            if ($medicament->getConstitution() === $this) {
                $medicament->setConstitution(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|COMPOSANT[]
     */
    public function getComposants(): Collection
    {
        return $this->composants;
    }

    public function addComposant(COMPOSANT $composant): self
    {
        if (!$this->composants->contains($composant)) {
            $this->composants[] = $composant;
        }

        return $this;
    }

    public function removeComposant(COMPOSANT $composant): self
    {
        $this->composants->removeElement($composant);

        return $this;
    }
}
