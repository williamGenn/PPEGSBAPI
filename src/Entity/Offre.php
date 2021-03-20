<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 */
class Offre
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
    private $Quantite;

    /**
     * @ORM\ManyToOne(targetEntity=RAPPORTVISITE::class, inversedBy="offres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rapport;

    /**
     * @ORM\ManyToMany(targetEntity=MEDICAMENT::class, inversedBy="offres")
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

    public function getQuantite(): ?int
    {
        return $this->Quantite;
    }

    public function setQuantite(int $Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getRapport(): ?RAPPORTVISITE
    {
        return $this->rapport;
    }

    public function setRapport(?RAPPORTVISITE $rapport): self
    {
        $this->rapport = $rapport;

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
        }

        return $this;
    }

    public function removeMedicament(MEDICAMENT $medicament): self
    {
        $this->medicaments->removeElement($medicament);

        return $this;
    }
}
