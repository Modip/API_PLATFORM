<?php

namespace App\Entity;

use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgenceRepository::class)
 */

class Agence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $region;


    /**
     * @ORM\OneToMany(targetEntity=Compteph::class, mappedBy="agence")
     */
    private $comptephs;

    /**
     * @ORM\OneToMany(targetEntity=Comptemor::class, mappedBy="agence")
     */
    private $comptemors;

    public function __construct()
    {
        $this->comptephs = new ArrayCollection();
        $this->comptemors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @return Collection|Compteph[]
     */
    public function getComptephs(): Collection
    {
        return $this->comptephs;
    }

    public function addCompteph(Compteph $compteph): self
    {
        if (!$this->comptephs->contains($compteph)) {
            $this->comptephs[] = $compteph;
            $compteph->setAgence($this);
        }

        return $this;
    }

    public function removeCompteph(Compteph $compteph): self
    {
        if ($this->comptephs->contains($compteph)) {
            $this->comptephs->removeElement($compteph);
            // set the owning side to null (unless already changed)
            if ($compteph->getAgence() === $this) {
                $compteph->setAgence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comptemor[]
     */
    public function getComptemors(): Collection
    {
        return $this->comptemors;
    }

    public function addComptemor(Comptemor $comptemor): self
    {
        if (!$this->comptemors->contains($comptemor)) {
            $this->comptemors[] = $comptemor;
            $comptemor->setAgence($this);
        }

        return $this;
    }

    public function removeComptemor(Comptemor $comptemor): self
    {
        if ($this->comptemors->contains($comptemor)) {
            $this->comptemors->removeElement($comptemor);
            // set the owning side to null (unless already changed)
            if ($comptemor->getAgence() === $this) {
                $comptemor->setAgence(null);
            }
        } 
        return $this;
    }
}
