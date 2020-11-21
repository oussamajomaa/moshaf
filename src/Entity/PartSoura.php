<?php

namespace App\Entity;

use App\Repository\PartSouraRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartSouraRepository::class)
 */
class PartSoura
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Soura::class, inversedBy="partSouras")
     * @ORM\JoinColumn(nullable=false)
     */
    private $soura;

    /**
     * @ORM\ManyToOne(targetEntity=Part::class, inversedBy="partSouras")
     */
    private $part;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoura(): ?Soura
    {
        return $this->soura;
    }

    public function setSoura(?Soura $soura): self
    {
        $this->soura = $soura;

        return $this;
    }

    public function getPart(): ?Part
    {
        return $this->part;
    }

    public function setPart(?Part $part): self
    {
        $this->part = $part;

        return $this;
    }
}
