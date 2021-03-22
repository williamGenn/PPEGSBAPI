<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ACTIVITECOMPLRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ACTIVITECOMPLRepository::class)
 */
class activitecompl
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     *@ORM\Column(type="integer")
     */
    private $AC_NUM;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $AC_DATE;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $AC_LIEU;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $AC_THEME;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $AC_MOTIF;

    /**
     * @ORM\ManyToMany(targetEntity=VISITEUR::class, mappedBy="acitivites_complementaires")
     */
    private $Realisateurs;

    /**
     * @ORM\ManyToMany(targetEntity=PRATICIEN::class, inversedBy="invitations")
     */
    private $invites;

    public function __construct()
    {
        $this->Realisateurs = new ArrayCollection();
        $this->invites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function setAC_NUM(int $AC_NUM) {
        $this->AC_NUM = $AC_NUM;
    }
    public function getAC_NUM() : ?int
    {
        return $this->AC_NUM;
    }
    
    public function getACDATE(): ?\DateTimeInterface
    {
        return $this->AC_DATE;
    }

    public function setACDATE(?\DateTimeInterface $AC_DATE): self
    {
        $this->AC_DATE = $AC_DATE;

        return $this;
    }

    public function getACLIEU(): ?string
    {
        return $this->AC_LIEU;
    }

    public function setACLIEU(?string $AC_LIEU): self
    {
        $this->AC_LIEU = $AC_LIEU;

        return $this;
    }

    public function getACTHEME(): ?string
    {
        return $this->AC_THEME;
    }

    public function setACTHEME(?string $AC_THEME): self
    {
        $this->AC_THEME = $AC_THEME;

        return $this;
    }

    public function getACMOTIF(): ?string
    {
        return $this->AC_MOTIF;
    }

    public function setACMOTIF(?string $AC_MOTIF): self
    {
        $this->AC_MOTIF = $AC_MOTIF;

        return $this;
    }

    /**
     * @return Collection|VISITEUR[]
     */
    public function getRealisateurs(): Collection
    {
        return $this->Realisateurs;
    }

    public function addRealisateur(VISITEUR $realisateur): self
    {
        if (!$this->Realisateurs->contains($realisateur)) {
            $this->Realisateurs[] = $realisateur;
            $realisateur->addAcitivitesComplementaire($this);
        }

        return $this;
    }

    public function removeRealisateur(VISITEUR $realisateur): self
    {
        if ($this->Realisateurs->removeElement($realisateur)) {
            $realisateur->removeAcitivitesComplementaire($this);
        }

        return $this;
    }

    /**
     * @return Collection|PRATICIEN[]
     */
    public function getInvites(): Collection
    {
        return $this->invites;
    }

    public function addInvite(PRATICIEN $invite): self
    {
        if (!$this->invites->contains($invite)) {
            $this->invites[] = $invite;
        }

        return $this;
    }

    public function removeInvite(PRATICIEN $invite): self
    {
        $this->invites->removeElement($invite);

        return $this;
    }
}
