<?php

namespace App\Entity;

use App\Repository\SavonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SavonRepository::class)
 */
class Savon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $surgraissage;

    /**
     * @ORM\Column(type="integer")
     */
    private $concentrationSoude;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=1, nullable=true)
     */
    private $masseSoude;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;

    /**
     * @ORM\ManyToMany(targetEntity=Huile::class, inversedBy="savons")
     */
    private $huiles;

    /**
     * @ORM\Column(type="object")
     */
    private $huileChoisie;


    public function __construct()
    {
        $this->huiles = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSurgraissage(): ?int
    {
        return $this->surgraissage;
    }

    public function setSurgraissage(int $surgraissage): self
    {
        $this->surgraissage = $surgraissage;

        return $this;
    }

    public function getConcentrationSoude(): ?int
    {
        return $this->concentrationSoude;
    }

    public function setConcentrationSoude(int $concentrationSoude): self
    {
        $this->concentrationSoude = $concentrationSoude;

        return $this;
    }

    public function getMasseSoude(): ?string
    {
        return $this->masseSoude;
    }

    public function setMasseSoude(?string $masseSoude): self
    {
        $this->masseSoude = $masseSoude;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * @return Collection<int, Huile>
     */
    public function getHuiles(): Collection
    {
        return $this->huiles;
    }

    public function addHuile(Huile $huile): self
    {
        if (!$this->huiles->contains($huile)) {
            $this->huiles[] = $huile;
        }

        return $this;
    }

    public function removeHuile(Huile $huile): self
    {
        $this->huiles->removeElement($huile);

        return $this;
    }

    public function getHuileChoisie(): ?object
    {
        return $this->huileChoisie;
    }

    public function setHuileChoisie(object $huileChoisie)
    {
        $this->huileChoisie = $huileChoisie;

        return $this;
    }


}
