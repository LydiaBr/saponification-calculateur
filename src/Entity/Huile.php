<?php

namespace App\Entity;

use App\Repository\HuileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HuileRepository::class)
 */
class Huile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=3)
     */
    private $indiceSaponification;

    /**
     * @ORM\Column(type="integer")
     */
    private $INS;

    /**
     * @ORM\Column(type="integer")
     */
    private $indiceIode;

    /**
     *
     * @ORM\ManyToMany(targetEntity=Savon::class)
     */
    private $savons;

    public function __construct()
    {
        $this->savons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIndiceSaponification(): ?string
    {
        return $this->indiceSaponification;
    }

    public function setIndiceSaponification(string $indiceSaponification): self
    {
        $this->indiceSaponification = $indiceSaponification;

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

    public function getINS(): ?int
    {
        return $this->INS;
    }

    public function setINS(int $INS): self
    {
        $this->INS = $INS;

        return $this;
    }

    public function getIndiceIode(): ?int
    {
        return $this->indiceIode;
    }

    public function setIndiceIode(int $indiceIode): self
    {
        $this->indiceIode = $indiceIode;

        return $this;
    }

    /**
     * @return Collection<int, Savon>
     */
    public function getSavons(): Collection
    {
        return $this->savons;
    }
/*
    public function addSavon(Savon $savon): self
    {
        if (!$this->savons->contains($savon)) {
            $this->savons[] = $savon;
            $savon->addHuile($this);
        }

        return $this;
    }

    public function removeSavon(Savon $savon): self
    {
        if ($this->savons->removeElement($savon)) {
            $savon->removeHuile($this);
        }

        return $this;
    }*/

    public function addSavon(Savon $savon)
    {
        if (!$this->savons->contains($savon)) {
            $this->savons[] = $savon;
            $savon->addHuile($this);
        }

        return $this;
    }

    public function removeSavon(Savon $savon)
    {
        if ($this->savons->contains($savon)) {
            $this->savons->removeElement($savon);
            // set the owning side to null (unless already changed)
            if ($savon->getHuiles() === $this) {
                $savon->addHuile(null);
            }
        }

        return $this;
    }




}
