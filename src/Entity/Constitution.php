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
    private $Quantit;

    /**
     * @ORM\OneToMany(targetEntity=medicament::class, mappedBy="constitution")
     */
    private $medicaments;

    /**
     * @ORM\ManyToMany(targetEntity=composant::class, inversedBy="constitutions")
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

    public function getQuantit(): ?int
    {
        return $this->Quantit;
    }

    public function setQuantit(int $Quantit): self
    {
        $this->Quantit = $Quantit;

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
            $medicament->setConstitution($this);
        }

        return $this;
    }

    public function removeMedicament(medicament $medicament): self
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
     * @return Collection|composant[]
     */
    public function getComposants(): Collection
    {
        return $this->composants;
    }

    public function addComposant(composant $composant): self
    {
        if (!$this->composants->contains($composant)) {
            $this->composants[] = $composant;
        }

        return $this;
    }

    public function removeComposant(composant $composant): self
    {
        $this->composants->removeElement($composant);

        return $this;
    }
}
