<?php

namespace App\Entity;

use App\Repository\SortieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SortieRepository::class)
 */
class Sortie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sort_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $sort_prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $sort_quantite;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getSortDate(): ?\DateTimeInterface
    {
        return $this->sort_date;
    }

    public function setSortDate(\DateTimeInterface $sort_date): self
    {
        $this->sort_date = $sort_date;

        return $this;
    }

    public function getSortPrix(): ?int
    {
        return $this->sort_prix;
    }

    public function setSortPrix(int $sort_prix): self
    {
        $this->sort_prix = $sort_prix;

        return $this;
    }

    public function getSortQuantite(): ?int
    {
        return $this->sort_quantite;
    }

    public function setSortQuantite(int $sort_quantite): self
    {
        $this->sort_quantite = $sort_quantite;

        return $this;
    }
}
