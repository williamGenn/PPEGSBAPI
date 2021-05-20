<?php

namespace App\Entity;

use App\Repository\visiteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
/**
 * @ApiResource(
 *      itemOperations={
 *          "get" = {
 *              "normalization_context"={
 *                  "groups"={"VIS"}
 *              }
 *          }
 *      },
 *      collectionOperations= {
 *           "get" = {
 *              "normalization_context"={
 *                  "groups"={"VIS"}
 *              }
 *          }
 *      },
 * )
 * @ApiFilter(SearchFilter::class, properties= {
 *  "VIS_NOM":"partial"
 * })
 * @ORM\Entity(repositoryClass=visiteurRepository::class)
 */
class visiteur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("VIS")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups("VIS")
     */
    private $VIS_MATRICULE;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Groups("VIS")
     */
    private $VIS_NOM;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups("VIS")
     */
    private $VIS_PRENOM;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups("VIS")
     */
    private $VIS_ADRESSE;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Groups("VIS")
     */
    private $VIS_CP;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("VIS")
     */
    private $VIS_DATEEMBAUCHE;

    /**
     * @ORM\ManyToOne(targetEntity=secteur::class, inversedBy="responsables")
     * @Groups("VIS_SEC")
     */
    private $secteur;

    /**
     * @ORM\OneToMany(targetEntity=rapportVisite::class, mappedBy="visiteur")
     * @Groups("VIS_RAP")
     */
    private $rapports;

    /**
     * @ORM\ManyToOne(targetEntity=labo::class, inversedBy="Visiteurs")
     * @ORM\JoinColumn(nullable=false)
     * @Groups("VIS_DEP")
     */
    private $departement;

    /**
     * @ORM\ManyToMany(targetEntity=activitecompl::class, inversedBy="Realisateurs")
     * @Groups("VIS_ACC")
     */
    private $acitivites_complementaires;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     * @Groups("VIS")
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

    public function getVISDATEEMBAUCHE(): ?\DateTimeInterface
    {
        return $this->VIS_DATEEMBAUCHE;
    }

    public function setVISDATEEMBAUCHE(?\DateTimeInterface $VIS_DATEEMBAUCHE): self
    {
        $this->VIS_DATEEMBAUCHE = $VIS_DATEEMBAUCHE;

        return $this;
    }

    public function getSecteur(): ?secteur
    {
        return $this->secteur;
    }

    public function setSecteur(?secteur $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * @return Collection|rapportVisite[]
     */
    public function getRapports(): Collection
    {
        return $this->rapports;
    }

    public function addRapport(rapportVisite $rapport): self
    {
        if (!$this->rapports->contains($rapport)) {
            $this->rapports[] = $rapport;
            $rapport->setVisiteur($this);
        }

        return $this;
    }

    public function removeRapport(rapportVisite $rapport): self
    {
        if ($this->rapports->removeElement($rapport)) {
            // set the owning side to null (unless already changed)
            if ($rapport->getVisiteur() === $this) {
                $rapport->setVisiteur(null);
            }
        }

        return $this;
    }

    public function getDepartement(): ?labo
    {
        return $this->departement;
    }

    public function setDepartement(?labo $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection|activitecompl[]
     */
    public function getAcitivitesComplementaires(): Collection
    {
        return $this->acitivites_complementaires;
    }

    public function addAcitivitesComplementaire(activitecompl $acitivitesComplementaire): self
    {
        if (!$this->acitivites_complementaires->contains($acitivitesComplementaire)) {
            $this->acitivites_complementaires[] = $acitivitesComplementaire;
        }

        return $this;
    }

    public function removeAcitivitesComplementaire(activitecompl $acitivitesComplementaire): self
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
