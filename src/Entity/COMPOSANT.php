<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\COMPOSANTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=COMPOSANTRepository::class)
 */
class COMPOSANT
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=4)
     */
    private $CMP_CODE;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $CMP_LIBELLE;

    /**
     * @ORM\ManyToMany(targetEntity=Constitution::class, mappedBy="composants")
     */
    private $constitutions;

    public function __construct()
    {
        $this->constitutions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCMPCODE(): ?string
    {
        return $this->CMP_CODE;
    }

    public function setCMPCODE(string $CMP_CODE): self
    {
        $this->CMP_CODE = $CMP_CODE;

        return $this;
    }

    public function getCMPLIBELLE(): ?string
    {
        return $this->CMP_LIBELLE;
    }

    public function setCMPLIBELLE(?string $CMP_LIBELLE): self
    {
        $this->CMP_LIBELLE = $CMP_LIBELLE;

        return $this;
    }

    /**
     * @return Collection|Constitution[]
     */
    public function getConstitutions(): Collection
    {
        return $this->constitutions;
    }

    public function addConstitution(Constitution $constitution): self
    {
        if (!$this->constitutions->contains($constitution)) {
            $this->constitutions[] = $constitution;
            $constitution->addComposant($this);
        }

        return $this;
    }

    public function removeConstitution(Constitution $constitution): self
    {
        if ($this->constitutions->removeElement($constitution)) {
            $constitution->removeComposant($this);
        }

        return $this;
    }
}
