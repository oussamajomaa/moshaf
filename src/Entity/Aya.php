<?php

namespace App\Entity;

use App\Repository\AyaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AyaRepository::class)
 */
class Aya
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity=Soura::class, inversedBy="ayas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $soura;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getSoura(): ?Soura
    {
        return $this->soura;
    }

    public function setSoura(?Soura $soura): self
    {
        $this->soura = $soura;

        return $this;
    }

    
}
