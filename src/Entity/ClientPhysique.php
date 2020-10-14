<?php

namespace App\Entity;

use App\Repository\ClientPhysiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientPhysiqueRepository::class)
 */
class ClientPhysique
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;



    /**
     * @ORM\ManyToOne(targetEntity=ClientMoral::class, inversedBy="clientPhysiques")
     */
    private $employeur;

    /**
     * @ORM\OneToMany(targetEntity=Compteph::class, mappedBy="clientphysique")
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }
   

    public function getEmployeur(): ?ClientMoral
    {
        return $this->employeur;
    }

    public function setEmployeur(?ClientMoral $employeur): self
    {
        $this->employeur = $employeur;

        return $this;
    }

    public function __toString()
    {
        return $this->nom.' '.$this->prenom;
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
            $compteph->setClientphysique($this);
        }

        return $this;
    }

    public function removeCompteph(Compteph $compteph): self
    {
        if ($this->comptephs->contains($compteph)) {
            $this->comptephs->removeElement($compteph);
            // set the owning side to null (unless already changed)
            if ($compteph->getClientphysique() === $this) {
                $compteph->setClientphysique(null);
            }
        }

        return $this;
    }

}
