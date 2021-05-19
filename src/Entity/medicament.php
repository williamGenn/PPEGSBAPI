<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\medicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=medicamentRepository::class)
 * @ApiResource(
 *      itemOperations={
 *          "get" = {
 *              "normalization_context"={
 *                  "groups"={"MED"}
 *              }
 *          }
 *      },
 *      collectionOperations= {
 *           "get" = {
 *              "normalization_context"={
 *                  "groups"={"MED"}
 *              }
 *          }
 *      },
 * )
 */
class medicament
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups("MED")
     */
    private $MED_DEPOTLEGAL;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Groups("MED")
     */
    private $MED_NOMCOMMERCIAL;

    /**
     * @ORM\ManyToOne(targetEntity=famille::class, inversedBy="mEDICAMENTs")
     */
    private $famille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("MED")
     */
    private $MED_COMPOSITION;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("MED")
     */
    private $MED_CONTREINDIC;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups("MED")
     */
    private $MED_PRIXECHANTILLON;

    /**
     * @ORM\ManyToMany(targetEntity=composant::class)
     */
    private $composants;

    /**
     * @ORM\ManyToMany(targetEntity=medicament::class, inversedBy="perturbes")
     */
    private $perturbateurs;

    /**
     * @ORM\ManyToMany(targetEntity=medicament::class, mappedBy="perturbateurs")
     */
    private $perturbes;

    /**
     * @ORM\ManyToMany(targetEntity=presentation::class, inversedBy="medicaments")
     */
    private $presentations;

    /**
     * @ORM\ManyToMany(targetEntity=Offre::class, mappedBy="medicaments")
     */
    private $offres;

    /**
     * @ORM\ManyToOne(targetEntity=Constitution::class, inversedBy="medicaments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constitution;

    /**
     * @ORM\OneToMany(targetEntity=prescription::class, mappedBy="medicaments")
     */
    private $prescriptions;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("MED")
     */
    private $MED_EFFETS;

    public function __construct()
    {
        $this->composants = new ArrayCollection();
        $this->perturbateurs = new ArrayCollection();
        $this->perturbes = new ArrayCollection();
        $this->presentations = new ArrayCollection();
        $this->offres = new ArrayCollection();
        $this->prescriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMEDDEPOTLEGAL(): ?string
    {
        return $this->MED_DEPOTLEGAL;
    }

    public function setMEDDEPOTLEGAL(string $MED_DEPOTLEGAL): self
    {
        $this->MED_DEPOTLEGAL = $MED_DEPOTLEGAL;

        return $this;
    }

    public function getMEDNOMCOMMERCIAL(): ?string
    {
        return $this->MED_NOMCOMMERCIAL;
    }

    public function setMEDNOMCOMMERCIAL(?string $MED_NOMCOMMERCIAL): self
    {
        $this->MED_NOMCOMMERCIAL = $MED_NOMCOMMERCIAL;

        return $this;
    }

    public function getfamille(): ?famille
    {
        return $this->famille;
    }

    public function setfamille(?famille $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getMEDCOMPOSITION(): ?string
    {
        return $this->MED_COMPOSITION;
    }

    public function setMEDCOMPOSITION(?string $MED_COMPOSITION): self
    {
        $this->MED_COMPOSITION = $MED_COMPOSITION;

        return $this;
    }

    public function getMEDCONTREINDIC(): ?string
    {
        return $this->MED_CONTREINDIC;
    }

    public function setMEDCONTREINDIC(?string $MED_CONTREINDIC): self
    {
        $this->MED_CONTREINDIC = $MED_CONTREINDIC;

        return $this;
    }

    public function getMEDPRIXECHANTILLON(): ?float
    {
        return $this->MED_PRIXECHANTILLON;
    }

    public function setMEDPRIXECHANTILLON(?float $MED_PRIXECHANTILLON): self
    {
        $this->MED_PRIXECHANTILLON = $MED_PRIXECHANTILLON;

        return $this;
    }

    /**
     * @return Collection|composant[]
     */
    public function getcomposants(): Collection
    {
        return $this->composants;
    }

    public function addcomposant(composant $cOMPOSANT): self
    {
        if (!$this->composants->contains($cOMPOSANT)) {
            $this->composants[] = $cOMPOSANT;
        }

        return $this;
    }

    public function removecomposant(composant $cOMPOSANT): self
    {
        $this->composants->removeElement($cOMPOSANT);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getPerturbateurs(): Collection
    {
        return $this->perturbateurs;
    }

    public function addPerturbateur(self $perturbateur): self
    {
        if (!$this->perturbateurs->contains($perturbateur)) {
            $this->perturbateurs[] = $perturbateur;
        }

        return $this;
    }

    public function removePerturbateur(self $perturbateur): self
    {
        $this->perturbateurs->removeElement($perturbateur);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getPerturbes(): Collection
    {
        return $this->perturbes;
    }

    public function addPerturbe(self $perturbe): self
    {
        if (!$this->perturbes->contains($perturbe)) {
            $this->perturbes[] = $perturbe;
            $perturbe->addPerturbateur($this);
        }

        return $this;
    }

    public function removePerturbe(self $perturbe): self
    {
        if ($this->perturbes->removeElement($perturbe)) {
            $perturbe->removePerturbateur($this);
        }

        return $this;
    }

    /**
     * @return Collection|presentation[]
     */
    public function getPresentations(): Collection
    {
        return $this->presentations;
    }

    public function addPresentation(presentation $presentation): self
    {
        if (!$this->presentations->contains($presentation)) {
            $this->presentations[] = $presentation;
        }

        return $this;
    }

    public function removePresentation(presentation $presentation): self
    {
        $this->presentations->removeElement($presentation);

        return $this;
    }

    /**
     * @return Collection|Offre[]
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offre $offre): self
    {
        if (!$this->offres->contains($offre)) {
            $this->offres[] = $offre;
            $offre->addMedicament($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): self
    {
        if ($this->offres->removeElement($offre)) {
            $offre->removeMedicament($this);
        }

        return $this;
    }

    public function getConstitution(): ?Constitution
    {
        return $this->constitution;
    }

    public function setConstitution(?Constitution $constitution): self
    {
        $this->constitution = $constitution;

        return $this;
    }

    /**
     * @return Collection|prescription[]
     */
    public function getprescriptions(): Collection
    {
        return $this->prescriptions;
    }

    public function addprescription(prescription $pRESCRIPTION): self
    {
        if (!$this->prescriptions->contains($pRESCRIPTION)) {
            $this->prescriptions[] = $pRESCRIPTION;
            $pRESCRIPTION->setMedicaments($this);
        }

        return $this;
    }

    public function removeprescription(prescription $pRESCRIPTION): self
    {
        if ($this->prescriptions->removeElement($pRESCRIPTION)) {
            // set the owning side to null (unless already changed)
            if ($pRESCRIPTION->getMedicaments() === $this) {
                $pRESCRIPTION->setMedicaments(null);
            }
        }

        return $this;
    }

    public function getMEDEFFETS(): ?string
    {
        return $this->MED_EFFETS;
    }

    public function setMEDEFFETS(?string $MED_EFFETS): self
    {
        $this->MED_EFFETS = $MED_EFFETS;

        return $this;
    }
}
