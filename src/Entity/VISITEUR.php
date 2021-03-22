<?php

namespace App\Entity;

use App\Repository\VISITEURRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VISITEURRepository::class)
 */
class VISITEUR
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
    private $VIS_MATRICULE;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $VIS_NOM;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $VIS_PRENOM;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $VIS_ADRESSE;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $VIS_CP;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $VIs_DATEEMBAUCHE;

    /**
     * @ORM\ManyToOne(targetEntity=SECTEUR::class, inversedBy="responsables")
     */
    private $secteur;

    /**
     * @ORM\OneToMany(targetEntity=RAPPORTVISITE::class, mappedBy="visiteur")
     */
    private $rapports;

    /**
     * @ORM\ManyToOne(targetEntity=LABO::class, inversedBy="Visiteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    /**
     * @ORM\ManyToMany(targetEntity=ACTIVITECOMPL::class, inversedBy="Realisateurs")
     */
    private $acitivites_complementaires;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $VIS_VILLE;

    public function __construct()
    {
        $this->rapports = new ArrayCollection();
        $this->acitivites_complementaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVISMATRICULE(): ?string
    {
        return $this->VIS_MATRICULE;
    }

    public function setVISMATRICULE(string $VIS_MATRICULE): self
    {
        $this->VIS_MATRICULE = $VIS_MATRICULE;

        return $this;
    }

    public function getVISNOM(): ?string
    {
        return $this->VIS_NOM;
    }

    public function setVISNOM(?string $VIS_NOM): self
    {
        $this->VIS_NOM = $VIS_NOM;

        return $this;
    }

    public function getVISPRENOM(): ?string
    {
        return $this->VIS_PRENOM;
    }

    public function setVISPRENOM(?string $VIS_PRENOM): self
    {
        $this->VIS_PRENOM = $VIS_PRENOM;

        return $this;
    }

    public function getVISADRESSE(): ?string
    {
        return $this->VIS_ADRESSE;
    }

    public function setVISADRESSE(?string $VIS_ADRESSE): self
    {
        $this->VIS_ADRESSE = $VIS_ADRESSE;

        return $this;
    }

    public function getVISCP(): ?string
    {
        return $this->VIS_CP;
    }

    public function setVISCP(?string $VIS_CP): self
    {
        $this->VIS_CP = $VIS_CP;

        return $this;
    }

    public function getVIsDATEEMBAUCHE(): ?\DateTimeInterface
    {
        return $this->VIs_DATEEMBAUCHE;
    }

    public function setVIsDATEEMBAUCHE(?\DateTimeInterface $VIs_DATEEMBAUCHE): self
    {
        $this->VIs_DATEEMBAUCHE = $VIs_DATEEMBAUCHE;

        return $this;
    }

    public function getSecteur(): ?SECTEUR
    {
        return $this->secteur;
    }

    public function setSecteur(?SECTEUR $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * @return Collection|RAPPORTVISITE[]
     */
    public function getRapports(): Collection
    {
        return $this->rapports;
    }

    public function addRapport(RAPPORTVISITE $rapport): self
    {
        if (!$this->rapports->contains($rapport)) {
            $this->rapports[] = $rapport;
            $rapport->setVisiteur($this);
        }

        return $this;
    }

    public function removeRapport(RAPPORTVISITE $rapport): self
    {
        if ($this->rapports->removeElement($rapport)) {
            // set the owning side to null (unless already changed)
            if ($rapport->getVisiteur() === $this) {
                $rapport->setVisiteur(null);
            }
        }

        return $this;
    }

    public function getDepartement(): ?LABO
    {
        return $this->departement;
    }

    public function setDepartement(?LABO $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection|ACTIVITECOMPL[]
     */
    public function getAcitivitesComplementaires(): Collection
    {
        return $this->acitivites_complementaires;
    }

    public function addAcitivitesComplementaire(ACTIVITECOMPL $acitivitesComplementaire): self
    {
        if (!$this->acitivites_complementaires->contains($acitivitesComplementaire)) {
            $this->acitivites_complementaires[] = $acitivitesComplementaire;
        }

        return $this;
    }

    public function removeAcitivitesComplementaire(ACTIVITECOMPL $acitivitesComplementaire): self
    {
        $this->acitivites_complementaires->removeElement($acitivitesComplementaire);

        return $this;
    }

    public function getVISVILLE(): ?string
    {
        return $this->VIS_VILLE;
    }

    public function setVISVILLE(?string $VIS_VILLE): self
    {
        $this->VIS_VILLE = $VIS_VILLE;

        return $this;
    }
}
