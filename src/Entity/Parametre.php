<?php

namespace App\Entity;

use App\Repository\ParametreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParametreRepository::class)
 */
class Parametre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $param_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_site;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_smtp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_mdp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $param_actif;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParamCode(): ?int
    {
        return $this->param_code;
    }

    public function setParamCode(int $param_code): self
    {
        $this->param_code = $param_code;

        return $this;
    }

    public function getParamSite(): ?string
    {
        return $this->param_site;
    }

    public function setParamSite(string $param_site): self
    {
        $this->param_site = $param_site;

        return $this;
    }

    public function getParamSmtp(): ?string
    {
        return $this->param_smtp;
    }

    public function setParamSmtp(string $param_smtp): self
    {
        $this->param_smtp = $param_smtp;

        return $this;
    }

    public function getParamMdp(): ?string
    {
        return $this->param_mdp;
    }

    public function setParamMdp(string $param_mdp): self
    {
        $this->param_mdp = $param_mdp;

        return $this;
    }

    public function getParamActif(): ?string
    {
        return $this->param_actif;
    }

    public function setParamActif(string $param_actif): self
    {
        $this->param_actif = $param_actif;

        return $this;
    }
}
