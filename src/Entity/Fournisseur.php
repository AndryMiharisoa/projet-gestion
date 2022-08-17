<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FournisseurRepository::class)
 */
class Fournisseur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $frn_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $frn_contact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $frn_adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $frn_mail;

    /**
     * @ORM\Column(type="text")
     */
    private $frn_observation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $frn_type;

    /**
     * @ORM\OneToMany(targetEntity=Entree::class, mappedBy="fournisseur")
     */
    private $entrees;

    public function __construct()
    {
        $this->entrees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrnNom(): ?string
    {
        return $this->frn_nom;
    }

    public function setFrnNom(string $frn_nom): self
    {
        $this->frn_nom = $frn_nom;

        return $this;
    }

    public function getFrnContact(): ?string
    {
        return $this->frn_contact;
    }

    public function setFrnContact(string $frn_contact): self
    {
        $this->frn_contact = $frn_contact;

        return $this;
    }

    public function getFrnAdresse(): ?string
    {
        return $this->frn_adresse;
    }

    public function setFrnAdresse(string $frn_adresse): self
    {
        $this->frn_adresse = $frn_adresse;

        return $this;
    }

    public function getFrnMail(): ?string
    {
        return $this->frn_mail;
    }

    public function setFrnMail(string $frn_mail): self
    {
        $this->frn_mail = $frn_mail;

        return $this;
    }

    public function getFrnObservation(): ?string
    {
        return $this->frn_observation;
    }

    public function setFrnObservation(string $frn_observation): self
    {
        $this->frn_observation = $frn_observation;

        return $this;
    }

    public function getFrnType(): ?string
    {
        return $this->frn_type;
    }

    public function setFrnType(string $frn_type): self
    {
        $this->frn_type = $frn_type;

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
            $entree->setFournisseur($this);
        }

        return $this;
    }

    public function removeEntree(Entree $entree): self
    {
        if ($this->entrees->removeElement($entree)) {
            // set the owning side to null (unless already changed)
            if ($entree->getFournisseur() === $this) {
                $entree->setFournisseur(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getFrnNom();
    }
}
