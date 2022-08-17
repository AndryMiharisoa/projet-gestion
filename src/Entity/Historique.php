<?php

namespace App\Entity;

use App\Repository\HistoriqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HistoriqueRepository::class)
 */
class Historique
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
    private $histo_ref_externe;

    /**
     * @ORM\Column(type="datetime")
     */
    private $histo_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $histo_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $histo_valeur;

    /**
     * @ORM\Column(type="text")
     */
    private $histo_observation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistoRefExterne(): ?string
    {
        return $this->histo_ref_externe;
    }

    public function setHistoRefExterne(string $histo_ref_externe): self
    {
        $this->histo_ref_externe = $histo_ref_externe;

        return $this;
    }

    public function getHistoDate(): ?\DateTimeInterface
    {
        return $this->histo_date;
    }

    public function setHistoDate(\DateTimeInterface $histo_date): self
    {
        $this->histo_date = $histo_date;

        return $this;
    }

    public function getHistoType(): ?string
    {
        return $this->histo_type;
    }

    public function setHistoType(string $histo_type): self
    {
        $this->histo_type = $histo_type;

        return $this;
    }

    public function getHistoValeur(): ?string
    {
        return $this->histo_valeur;
    }

    public function setHistoValeur(string $histo_valeur): self
    {
        $this->histo_valeur = $histo_valeur;

        return $this;
    }

    public function getHistoObservation(): ?string
    {
        return $this->histo_observation;
    }

    public function setHistoObservation(string $histo_observation): self
    {
        $this->histo_observation = $histo_observation;

        return $this;
    }
}
