<?php

namespace App\Entity;

use App\Repository\MEDICAMENTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MEDICAMENTRepository::class)
 */
class MEDICAMENT
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $MED_DEPOTLEGAL;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $MED_NOMCOMMERCIAL;

    /**
     * @ORM\ManyToOne(targetEntity=FAMILLE::class, inversedBy="mEDICAMENTs")
     */
    private $FAMILLE;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MED_COMPOSITION;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MED_CONTREINDIC;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $MED_PRIXECHANTILLON;

    /**
     * @ORM\ManyToMany(targetEntity=COMPOSANT::class)
     */
    private $COMPOSANTs;

    /**
     * @ORM\ManyToMany(targetEntity=MEDICAMENT::class, inversedBy="perturbes")
     */
    private $perturbateurs;

    /**
     * @ORM\ManyToMany(targetEntity=MEDICAMENT::class, mappedBy="perturbateurs")
     */
    private $perturbes;

    /**
     * @ORM\ManyToMany(targetEntity=PRESENTATION::class, inversedBy="medicaments")
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
     * @ORM\OneToMany(targetEntity=PRESCRIPTION::class, mappedBy="medicaments")
     */
    private $PRESCRIPTIONs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MED_EFFETS;

    public function __construct()
    {
        $this->COMPOSANTs = new ArrayCollection();
        $this->perturbateurs = new ArrayCollection();
        $this->perturbes = new ArrayCollection();
        $this->presentations = new ArrayCollection();
        $this->offres = new ArrayCollection();
        $this->PRESCRIPTIONs = new ArrayCollection();
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

    public function getFAMILLE(): ?FAMILLE
    {
        return $this->FAMILLE;
    }

    public function setFAMILLE(?FAMILLE $FAMILLE): self
    {
        $this->FAMILLE = $FAMILLE;

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
     * @return Collection|COMPOSANT[]
     */
    public function getCOMPOSANTs(): Collection
    {
        return $this->COMPOSANTs;
    }

    public function addCOMPOSANT(COMPOSANT $cOMPOSANT): self
    {
        if (!$this->COMPOSANTs->contains($cOMPOSANT)) {
            $this->COMPOSANTs[] = $cOMPOSANT;
        }

        return $this;
    }

    public function removeCOMPOSANT(COMPOSANT $cOMPOSANT): self
    {
        $this->COMPOSANTs->removeElement($cOMPOSANT);

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
     * @return Collection|PRESENTATION[]
     */
    public function getPresentations(): Collection
    {
        return $this->presentations;
    }

    public function addPresentation(PRESENTATION $presentation): self
    {
        if (!$this->presentations->contains($presentation)) {
            $this->presentations[] = $presentation;
        }

        return $this;
    }

    public function removePresentation(PRESENTATION $presentation): self
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
     * @return Collection|PRESCRIPTION[]
     */
    public function getPRESCRIPTIONs(): Collection
    {
        return $this->PRESCRIPTIONs;
    }

    public function addPRESCRIPTION(PRESCRIPTION $pRESCRIPTION): self
    {
        if (!$this->PRESCRIPTIONs->contains($pRESCRIPTION)) {
            $this->PRESCRIPTIONs[] = $pRESCRIPTION;
            $pRESCRIPTION->setMedicaments($this);
        }

        return $this;
    }

    public function removePRESCRIPTION(PRESCRIPTION $pRESCRIPTION): self
    {
        if ($this->PRESCRIPTIONs->removeElement($pRESCRIPTION)) {
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
