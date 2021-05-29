<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=OffreRepository::class)
 * @ApiResource(
 *      itemOperations={
 *          "get" = {
 *              "normalization_context"={
*                  "groups"={"OFF"}
 *              }
 *          },
 *      },
 *      collectionOperations= {
 *           "get" = {
 *              "normalization_context"={
 *                  "groups"={"OFF"}
 *              }
 *          }
 *      },
 * )
 */
class Offre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("OFF")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups("OFF")
     */
    private $Quantite;

    /**
     * @ORM\ManyToOne(targetEntity=rapportVisite::class, inversedBy="offres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rapport;

    /**
     * @ORM\ManyToMany(targetEntity=medicament::class, inversedBy="offres")
     * @Groups("OFF_MED")
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

    public function getRapport(): ?rapportVisite
    {
        return $this->rapport;
    }

    public function setRapport(?rapportVisite $rapport): self
    {
        $this->rapport = $rapport;

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
        }

        return $this;
    }

    public function addMedicaments($medicaments) {
      foreach ($medicaments as $medicament) {
        $this->addMedicament($medicament);
      }
    }

    public function removeMedicament(medicament $medicament): self
    {
        $this->medicaments->removeElement($medicament);

        return $this;
    }
}
