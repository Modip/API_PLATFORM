<?php

namespace App\Entity;

use App\Repository\ComptemorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ComptemorRepository::class)
 */
class Comptemor
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ClientMoral::class, inversedBy="comptemors")
     */
    private $Client;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="comptemors")
     */
    private $agence;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $solde;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $frais;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?ClientMoral
    {
        return $this->Client;
    }

    public function setClient(?ClientMoral $Client): self
    {
        $this->Client = $Client;

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getFrais(): ?string
    {
        return $this->frais;
    }

    public function setFrais(string $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
