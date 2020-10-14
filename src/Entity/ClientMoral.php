<?php

namespace App\Entity;

use App\Repository\ClientMoralRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientMoralRepository::class)
 */
class ClientMoral
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;


    /**
     * @ORM\OneToMany(targetEntity=ClientPhysique::class, mappedBy="employeur")
     */
    private $clientPhysiques;

    /**
     * @ORM\OneToMany(targetEntity=Comptemor::class, mappedBy="Client")
     */
    private $comptemors;

    public function __construct()
    {
        $this->clientPhysiques = new ArrayCollection();
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

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

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

    /**
     * @return Collection|ClientPhysique[]
     */
    public function getClientPhysiques(): Collection
    {
        return $this->clientPhysiques;
    }

    public function addClientPhysique(ClientPhysique $clientPhysique): self
    {
        if (!$this->clientPhysiques->contains($clientPhysique)) {
            $this->clientPhysiques[] = $clientPhysique;
            $clientPhysique->setEmployeur($this);
        }

        return $this;
    }

    public function removeClientPhysique(ClientPhysique $clientPhysique): self
    {
        if ($this->clientPhysiques->contains($clientPhysique)) {
            $this->clientPhysiques->removeElement($clientPhysique);
            // set the owning side to null (unless already changed)
            if ($clientPhysique->getEmployeur() === $this) {
                $clientPhysique->setEmployeur(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
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
            $comptemor->setClient($this);
        }

        return $this;
    }

    public function removeComptemor(Comptemor $comptemor): self
    {
        if ($this->comptemors->contains($comptemor)) {
            $this->comptemors->removeElement($comptemor);
            // set the owning side to null (unless already changed)
            if ($comptemor->getClient() === $this) {
                $comptemor->setClient(null);
            }
        }

        return $this;
    }

}
