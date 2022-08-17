<?php

namespace App\Entity;

use App\Repository\EntreeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntreeRepository::class)
 */
class Entree
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="entrees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity=Fournisseur::class, inversedBy="entrees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $entr_date;

    /**
     * @ORM\Column(type="float", length=255)
     */
    private $entr_prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $entr_quantite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    public function setFournisseur($fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getEntrDate(): ?\DateTimeInterface
    {
        return $this->entr_date;
    }

    public function setEntrDate(\DateTimeInterface $entr_date): self
    {
        $this->entr_date = $entr_date;

        return $this;
    }

    public function getEntrPrix(): ?float
    {
        return $this->entr_prix;
    }

    public function setEntrPrix(float $entr_prix): self
    {
        $this->entr_prix = $entr_prix;

        return $this;
    }

    public function getEntrQuantite(): ?int
    {
        return $this->entr_quantite;
    }

    public function setEntrQuantite(int $entr_quantite): self
    {
        $this->entr_quantite = $entr_quantite;

        return $this;
    }
}
