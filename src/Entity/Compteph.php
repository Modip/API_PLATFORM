<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ComptephRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;


/**
 * @ApiResource //Ces annotations permettent a API de charger cette entite
 * normalizationContext={"groups"={"compteph:read"}},
 * collection(Operations={"get"})
 * @ApiFilter(SearchFilter::class, properties={"numerocompte": "exact"})
 * @ORM\Entity(repositoryClass=ComptephRepository::class)
 *
 */
class Compteph
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ClientPhysique::class, inversedBy="comptephs")
     */
    private $clientphysique;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $numerocompte;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $solde;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $clerib;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $agios;

    /**
     * @ORM\ManyToOne(targetEntity=TypeCompte::class, inversedBy="comptephs")
     */
    private $typecompte;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="comptephs")
     */
    private $agence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientphysique(): ?ClientPhysique
    {
        return $this->clientphysique;
    }

    public function setClientphysique(?ClientPhysique $clientphysique): self
    {
        $this->clientphysique = $clientphysique;

        return $this;
    }

    public function getNumerocompte(): ?string
    {
        return $this->numerocompte;
    }

    public function setNumerocompte(string $numerocompte): self
    {
        $this->numerocompte = $numerocompte;

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

    public function getClerib(): ?string
    {
        return $this->clerib;
    }

    public function setClerib(string $clerib): self
    {
        $this->clerib = $clerib;

        return $this;
    }

    public function getAgios(): ?string
    {
        return $this->agios;
    }

    public function setAgios(string $agios): self
    {
        $this->agios = $agios;

        return $this;
    }

    public function getTypecompte(): ?TypeCompte
    {
        return $this->typecompte;
    }

    public function setTypecompte(?TypeCompte $typecompte): self
    {
        $this->typecompte = $typecompte;

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
}
