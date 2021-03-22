<?php

namespace App\Entity;

use App\Repository\FAMILLERepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FAMILLERepository::class)
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
     * @ORM\OneToMany(targetEntity=MEDICAMENT::class, mappedBy="FAMILLE")
     */
    private $MEDICAMENTs;

    public function __construct()
    {
        $this->MEDICAMENTs = new ArrayCollection();
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
     * @return Collection|MEDICAMENT[]
     */
    public function getMEDICAMENTs(): Collection
    {
        return $this->MEDICAMENTs;
    }

    public function addMEDICAMENT(MEDICAMENT $MEDICAMENT): self
    {
        if (!$this->MEDICAMENTs->contains($MEDICAMENT)) {
            $this->MEDICAMENTs[] = $MEDICAMENT;
            $MEDICAMENT->setFAMILLE($this);
        }

        return $this;
    }

    public function removeMEDICAMENT(MEDICAMENT $MEDICAMENT): self
    {
        if ($this->MEDICAMENTs->removeElement($MEDICAMENT)) {
            // set the owning side to null (unless already changed)
            if ($MEDICAMENT->getFAMILLE() === $this) {
                $MEDICAMENT->setFAMILLE(null);
            }
        }

        return $this;
    }
}
