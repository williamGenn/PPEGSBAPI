<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PRATICIENRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PRATICIENRepository::class)
 */
class PRATICIEN
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
    private $PRA_NUM;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $PRA_NOM;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $PRA_ADRESSE;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $PRA_CP;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $PRA_VILLE;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $PRA_COEFNOTORIETE;

    /**
     * @ORM\OneToMany(targetEntity=RAPPORTVISITE::class, mappedBy="praticien")
     */
    private $RAPPORTVISITEs;

    /**
     * @ORM\ManyToOne(targetEntity=TYPEPRATICIEN::class, inversedBy="PRATICIENs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=POSSEDER::class, inversedBy="praticien")
     */
    private $displomes;

    /**
     * @ORM\ManyToMany(targetEntity=ACTIVITECOMPL::class, mappedBy="invites")
     */
    private $invitations;

    public function __construct()
    {
        $this->RAPPORTVISITEs = new ArrayCollection();
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
     * @return Collection|RAPPORTVISITE[]
     */
    public function getRAPPORTVISITEs(): Collection
    {
        return $this->RAPPORTVISITEs;
    }

    public function addRAPPORTVISITE(RAPPORTVISITE $rAPPORTVISITE): self
    {
        if (!$this->RAPPORTVISITEs->contains($rAPPORTVISITE)) {
            $this->RAPPORTVISITEs[] = $rAPPORTVISITE;
            $rAPPORTVISITE->setPraticien($this);
        }

        return $this;
    }

    public function removeRAPPORTVISITE(RAPPORTVISITE $rAPPORTVISITE): self
    {
        if ($this->RAPPORTVISITEs->removeElement($rAPPORTVISITE)) {
            // set the owning side to null (unless already changed)
            if ($rAPPORTVISITE->getPraticien() === $this) {
                $rAPPORTVISITE->setPraticien(null);
            }
        }

        return $this;
    }

    public function getType(): ?TYPEPRATICIEN
    {
        return $this->type;
    }

    public function setType(?TYPEPRATICIEN $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDisplomes(): ?POSSEDER
    {
        return $this->displomes;
    }

    public function setDisplomes(?POSSEDER $displomes): self
    {
        $this->displomes = $displomes;

        return $this;
    }

    /**
     * @return Collection|ACTIVITECOMPL[]
     */
    public function getInvitations(): Collection
    {
        return $this->invitations;
    }

    public function addInvitation(ACTIVITECOMPL $invitation): self
    {
        if (!$this->invitations->contains($invitation)) {
            $this->invitations[] = $invitation;
            $invitation->addInvite($this);
        }

        return $this;
    }

    public function removeInvitation(ACTIVITECOMPL $invitation): self
    {
        if ($this->invitations->removeElement($invitation)) {
            $invitation->removeInvite($this);
        }

        return $this;
    }
}
