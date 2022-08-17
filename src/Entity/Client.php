<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $cli_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cli_contact;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cli_adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cli_mail;

    /**
     * @ORM\Column(type="text")
     */
    private $cli_observation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cli_type;

    /**
     * @ORM\OneToMany(targetEntity=Sortie::class, mappedBy="client")
     */
    private $sorties;

    public function __construct()
    {
        $this->sorties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliNom(): ?string
    {
        return $this->cli_nom;
    }

    public function setCliNom(string $cli_nom): self
    {
        $this->cli_nom = $cli_nom;

        return $this;
    }

    public function getCliContact(): ?string
    {
        return $this->cli_contact;
    }

    public function setCliContact(string $cli_contact): self
    {
        $this->cli_contact = $cli_contact;

        return $this;
    }

    public function getCliAdresse(): ?string
    {
        return $this->cli_adresse;
    }

    public function setCliAdresse(string $cli_adresse): self
    {
        $this->cli_adresse = $cli_adresse;

        return $this;
    }

    public function getCliMail(): ?string
    {
        return $this->cli_mail;
    }

    public function setCliMail(string $cli_mail): self
    {
        $this->cli_mail = $cli_mail;

        return $this;
    }

    public function getCliObservation(): ?string
    {
        return $this->cli_observation;
    }

    public function setCliObservation(string $cli_observation): self
    {
        $this->cli_observation = $cli_observation;

        return $this;
    }

    public function getCliType(): ?string
    {
        return $this->cli_type;
    }

    public function setCliType(string $cli_type): self
    {
        $this->cli_type = $cli_type;

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
            $sorty->setClient($this);
        }

        return $this;
    }

    public function removeSorty(Sortie $sorty): self
    {
        if ($this->sorties->removeElement($sorty)) {
            // set the owning side to null (unless already changed)
            if ($sorty->getClient() === $this) {
                $sorty->setClient(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getCliNom();
    }
}
