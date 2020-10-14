<?php

namespace App\Entity;

use App\Repository\TypeCompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeCompteRepository::class)
 */
class TypeCompte
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
    private $libelle;

   

    /**
     * @ORM\OneToMany(targetEntity=Compteph::class, mappedBy="typecompte")
     */
    private $comptephs;

    public function __construct()
    {
        $this->comptephs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }



  
    public function __toString()
    {
        return $this->libelle;
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
            $compteph->setTypecompte($this);
        }

        return $this;
    }

    public function removeCompteph(Compteph $compteph): self
    {
        if ($this->comptephs->contains($compteph)) {
            $this->comptephs->removeElement($compteph);
            // set the owning side to null (unless already changed)
            if ($compteph->getTypecompte() === $this) {
                $compteph->setTypecompte(null);
            }
        }

        return $this;
    }
}
