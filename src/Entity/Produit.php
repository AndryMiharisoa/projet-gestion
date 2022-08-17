<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=Images::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pro_nom;

    /**
     * @ORM\Column(type="float")
     */
    private $pro_prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pro_serial;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pro_date_peremption;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pro_status;

    /**
     * @ORM\OneToMany(targetEntity=Entree::class, mappedBy="produit")
     */
    private $entrees;

    /**
     * @ORM\OneToMany(targetEntity=Mouvement::class, mappedBy="produit")
     */
    private $mouvements;

    /**
     * @ORM\OneToMany(targetEntity=Sortie::class, mappedBy="produit")
     */
    private $sorties;

    /**
     * @ORM\Column(type="integer")
     */
    private $pro_quantite;

    public function __construct()
    {
        $this->entrees = new ArrayCollection();
        $this->mouvements = new ArrayCollection();
        $this->sorties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getImage(): ?Images
    {
        return $this->image;
    }

    public function setImage(?Images $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getProNom(): ?string
    {
        return $this->pro_nom;
    }

    public function setProNom(string $pro_nom): self
    {
        $this->pro_nom = $pro_nom;

        return $this;
    }

    public function getProPrix(): ?float
    {
        return $this->pro_prix;
    }

    public function setProPrix(float $pro_prix): self
    {
        $this->pro_prix = $pro_prix;

        return $this;
    }

    public function getProSerial(): ?string
    {
        return $this->pro_serial;
    }

    public function setProSerial(string $pro_serial): self
    {
        $this->pro_serial = $pro_serial;

        return $this;
    }

    public function getProDatePeremption(): ?\DateTimeInterface
    {
        return $this->pro_date_peremption;
    }

    public function setProDatePeremption(\DateTimeInterface $pro_date_peremption): self
    {
        $this->pro_date_peremption = $pro_date_peremption;

        return $this;
    }

    public function getProStatus(): ?bool
    {
        return $this->pro_status;
    }

    public function setProStatus(bool $pro_status): self
    {
        $this->pro_status = $pro_status;

        return $this;
    }

    /**
     * @return Collection|Entree[]
     */
    public function getEntrees(): Collection
    {
        return $this->entrees;
    }

    public function addEntree(Entree $entree): self
    {
        if (!$this->entrees->contains($entree)) {
            $this->entrees[] = $entree;
            $entree->setProduit($this);
        }

        return $this;
    }

    public function removeEntree(Entree $entree): self
    {
        if ($this->entrees->removeElement($entree)) {
            // set the owning side to null (unless already changed)
            if ($entree->getProduit() === $this) {
                $entree->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mouvement[]
     */
    public function getMouvements(): Collection
    {
        return $this->mouvements;
    }

    public function addMouvement(Mouvement $mouvement): self
    {
        if (!$this->mouvements->contains($mouvement)) {
            $this->mouvements[] = $mouvement;
            $mouvement->setProduit($this);
        }

        return $this;
    }

    public function removeMouvement(Mouvement $mouvement): self
    {
        if ($this->mouvements->removeElement($mouvement)) {
            // set the owning side to null (unless already changed)
            if ($mouvement->getProduit() === $this) {
                $mouvement->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sortie[]
     */
    public function getSorties(): Collection
    {
        return $this->sorties;
    }

    public function addSorty(Sortie $sorty): self
    {
        if (!$this->sorties->contains($sorty)) {
            $this->sorties[] = $sorty;
            $sorty->setProduit($this);
        }

        return $this;
    }

    public function removeSorty(Sortie $sorty): self
    {
        if ($this->sorties->removeElement($sorty)) {
            // set the owning side to null (unless already changed)
            if ($sorty->getProduit() === $this) {
                $sorty->setProduit(null);
            }
        }

        return $this;
    }

    public function getProQuantite(): ?int
    {
        return $this->pro_quantite;
    }

    public function setProQuantite(int $pro_quantite): self
    {
        $this->pro_quantite = $pro_quantite;

        return $this;
    }

    public function __toString()
    {
        return $this->getProNom();
    }

}
