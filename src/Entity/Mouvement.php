<?php

namespace App\Entity;

use App\Repository\MouvementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MouvementRepository::class)
 */
class Mouvement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="mouvements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mouv_type;

    /**
     * @ORM\Column(type="integer")
     */
    private $mouv_quantite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $mouv_date;

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

    public function getMouvType(): ?string
    {
        return $this->mouv_type;
    }

    public function setMouvType(string $mouv_type): self
    {
        $this->mouv_type = $mouv_type;

        return $this;
    }

    public function getMouvQuantite(): ?int
    {
        return $this->mouv_quantite;
    }

    public function setMouvQuantite(int $mouv_quantite): self
    {
        $this->mouv_quantite = $mouv_quantite;

        return $this;
    }

    public function getMouvDate(): ?\DateTimeInterface
    {
        return $this->mouv_date;
    }

    public function setMouvDate(\DateTimeInterface $mouv_date): self
    {
        $this->mouv_date = $mouv_date;

        return $this;
    }
}
