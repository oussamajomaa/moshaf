<?php

namespace App\Entity;

use App\Repository\PartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartRepository::class)
 */
class Part
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\OneToMany(targetEntity=PartSoura::class, mappedBy="part")
     */
    private $partSouras;

    public function __construct()
    {
        $this->partSouras = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $partSoura->setPart($this);
        }

        return $this;
    }

    public function removePartSoura(PartSoura $partSoura): self
    {
        if ($this->partSouras->contains($partSoura)) {
            $this->partSouras->removeElement($partSoura);
            // set the owning side to null (unless already changed)
            if ($partSoura->getPart() === $this) {
                $partSoura->setPart(null);
            }
        }

        return $this;
    }

    public function __toString() 
    {
        return (string) $this->name; 
    }
   
}
