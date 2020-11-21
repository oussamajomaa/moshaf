<?php

namespace App\Entity;

use App\Repository\SouraRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SouraRepository::class)
 */
class Soura
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
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;


    /**
     * @ORM\OneToMany(targetEntity=Aya::class, mappedBy="soura", orphanRemoval=true)
     */
    private $ayas;

    /**
     * @ORM\OneToMany(targetEntity=PartSoura::class, mappedBy="soura", orphanRemoval=true)
     */
    private $partSouras;

    /**
     * @ORM\OneToMany(targetEntity=AyaAccent::class, mappedBy="soura", orphanRemoval=true)
     */
    private $ayaAccents;


    public function __construct()
    {
        $this->ayas = new ArrayCollection();
        $this->partSouras = new ArrayCollection();
        $this->ayaAccents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }


    /**
     * @return Collection|Aya[]
     */
    public function getAyas(): Collection
    {
        return $this->ayas;
    }

    public function addAya(Aya $aya): self
    {
        if (!$this->ayas->contains($aya)) {
            $this->ayas[] = $aya;
            $aya->setSoura($this);
        }

        return $this;
    }

    public function removeAya(Aya $aya): self
    {
        if ($this->ayas->contains($aya)) {
            $this->ayas->removeElement($aya);
            // set the owning side to null (unless already changed)
            if ($aya->getSoura() === $this) {
                $aya->setSoura(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PartSoura[]
     */
    public function getPartSouras(): Collection
    {
        return $this->partSouras;
    }

    public function addPartSoura(PartSoura $partSoura): self
    {
        if (!$this->partSouras->contains($partSoura)) {
            $this->partSouras[] = $partSoura;
            $partSoura->setSoura($this);
        }

        return $this;
    }

    public function removePartSoura(PartSoura $partSoura): self
    {
        if ($this->partSouras->contains($partSoura)) {
            $this->partSouras->removeElement($partSoura);
            // set the owning side to null (unless already changed)
            if ($partSoura->getSoura() === $this) {
                $partSoura->setSoura(null);
            }
        }

        return $this;
    }

    public function __toString() 
    {
        return (string) $this->title; 
    }

    /**
     * @return Collection|AyaAccent[]
     */
    public function getAyaAccents(): Collection
    {
        return $this->ayaAccents;
    }

    public function addAyaAccent(AyaAccent $ayaAccent): self
    {
        if (!$this->ayaAccents->contains($ayaAccent)) {
            $this->ayaAccents[] = $ayaAccent;
            $ayaAccent->setSoura($this);
        }

        return $this;
    }

    public function removeAyaAccent(AyaAccent $ayaAccent): self
    {
        if ($this->ayaAccents->contains($ayaAccent)) {
            $this->ayaAccents->removeElement($ayaAccent);
            // set the owning side to null (unless already changed)
            if ($ayaAccent->getSoura() === $this) {
                $ayaAccent->setSoura(null);
            }
        }

        return $this;
    }

}
