<?php

namespace App\Entity;

use App\Repository\praticienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=praticienRepository::class)
 * @ApiResource(
 *      itemOperations={
 *          "get" = {
 *              "normalization_context"={
 *                  "groups"={"PRA"}
 *              }
 *          }
 *      },
 *      collectionOperations= {
 *           "get" = {
 *              "normalization_context"={
 *                  "groups"={"PRA"}
 *              }
 *          }
 *      },
 * )
 * @ApiFilter(SearchFilter::class, properties = {
 *  "PRA_CP" : "partial"
 * })
 */
class praticien
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups("PRA")
     */
    private $PRA_NUM;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Groups("PRA")
     */
    private $PRA_NOM;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups("PRA")
     */
    private $PRA_ADRESSE;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Groups("PRA")
     */
    private $PRA_CP;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Groups("PRA")
     */
    private $PRA_VILLE;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups("PRA")
     */
    private $PRA_COEFNOTORIETE;

    /**
     * @ORM\OneToMany(targetEntity=rapportVisite::class, mappedBy="praticien")
     * @Groups("PRA_RAP")
     */
    private $rapportVisites;

    /**
     * @ORM\ManyToOne(targetEntity=typePraticien::class, inversedBy="praticiens")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("PRA_TYP")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=posseder::class, inversedBy="praticien")
     * @Groups("PRA_DIP")
     */
    private $displomes;

    /**
     * @ORM\ManyToMany(targetEntity=activitecompl::class, mappedBy="invites")
     * @Groups("PRA_INV")
     */
    private $invitations;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     * @Groups("PRA")
     */
    private $PRA_PRENOM;

    public function __construct()
    {
        $this->rapportVisites = new ArrayCollection();
        $this->invitations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPRANUM(): ?int
    {
        return $this->PRA_NUM;
    }

    public function setPRANUM(int $PRA_NUM): self
    {
        $this->PRA_NUM = $PRA_NUM;

        return $this;
    }

    public function getPRANOM(): ?string
    {
        return $this->PRA_NOM;
    }

    public function setPRANOM(?string $PRA_NOM): self
    {
        $this->PRA_NOM = $PRA_NOM;

        return $this;
    }

    public function getPRAADRESSE(): ?string
    {
        return $this->PRA_ADRESSE;
    }

    public function setPRAADRESSE(?string $PRA_ADRESSE): self
    {
        $this->PRA_ADRESSE = $PRA_ADRESSE;

        return $this;
    }

    public function getPRACP(): ?string
    {
        return $this->PRA_CP;
    }

    public function setPRACP(?string $PRA_CP): self
    {
        $this->PRA_CP = $PRA_CP;

        return $this;
    }

    public function getPRAVILLE(): ?string
    {
        return $this->PRA_VILLE;
    }

    public function setPRAVILLE(?string $PRA_VILLE): self
    {
        $this->PRA_VILLE = $PRA_VILLE;

        return $this;
    }

    public function getPRACOEFNOTORIETE(): ?float
    {
        return $this->PRA_COEFNOTORIETE;
    }

    public function setPRACOEFNOTORIETE(?float $PRA_COEFNOTORIETE): self
    {
        $this->PRA_COEFNOTORIETE = $PRA_COEFNOTORIETE;

        return $this;
    }

    /**
     * @return Collection|rapportVisite[]
     */
    public function getrapportVisites(): Collection
    {
        return $this->rapportVisites;
    }

    public function addrapportVisite(rapportVisite $rAPPORTVISITE): self
    {
        if (!$this->rapportVisites->contains($rAPPORTVISITE)) {
            $this->rapportVisites[] = $rAPPORTVISITE;
            $rAPPORTVISITE->setPraticien($this);
        }

        return $this;
    }

    public function removerapportVisite(rapportVisite $rAPPORTVISITE): self
    {
        if ($this->rapportVisites->removeElement($rAPPORTVISITE)) {
            // set the owning side to null (unless already changed)
            if ($rAPPORTVISITE->getPraticien() === $this) {
                $rAPPORTVISITE->setPraticien(null);
            }
        }

        return $this;
    }

    public function getType(): ?typePraticien
    {
        return $this->type;
    }

    public function setType(?typePraticien $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDisplomes(): ?posseder
    {
        return $this->displomes;
    }

    public function setDisplomes(?posseder $displomes): self
    {
        $this->displomes = $displomes;

        return $this;
    }

    /**
     * @return Collection|activitecompl[]
     */
    public function getInvitations(): Collection
    {
        return $this->invitations;
    }

    public function addInvitation(activitecompl $invitation): self
    {
        if (!$this->invitations->contains($invitation)) {
            $this->invitations[] = $invitation;
            $invitation->addInvite($this);
        }

        return $this;
    }

    public function removeInvitation(activitecompl $invitation): self
    {
        if ($this->invitations->removeElement($invitation)) {
            $invitation->removeInvite($this);
        }

        return $this;
    }

    public function getPRAPRENOM(): ?string
    {
        return $this->PRA_PRENOM;
    }

    public function setPRAPRENOM(?string $PRA_PRENOM): self
    {
        $this->PRA_PRENOM = $PRA_PRENOM;

        return $this;
    }
}
