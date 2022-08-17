<?php

namespace App\Entity;

use App\Repository\TypographieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypographieRepository::class)
 */
class Typographie
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
    private $typo_groupe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typo_libelle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypoGroupe(): ?string
    {
        return $this->typo_groupe;
    }

    public function setTypoGroupe(string $typo_groupe): self
    {
        $this->typo_groupe = $typo_groupe;

        return $this;
    }

    public function getTypoLibelle(): ?string
    {
        return $this->typo_libelle;
    }

    public function setTypoLibelle(string $typo_libelle): self
    {
        $this->typo_libelle = $typo_libelle;

        return $this;
    }
}
