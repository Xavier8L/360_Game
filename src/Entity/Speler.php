<?php

namespace App\Entity;

use App\Repository\SpelerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpelerRepository::class)
 */
class Speler
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
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $leeftijd;




    /**
     * @ORM\OneToMany(targetEntity=Spel::class, mappedBy="speler")
     */
    private $spels;

    /**
     * @ORM\ManyToOne(targetEntity=Spel::class, inversedBy="spelers")
     */
    private $spel;

    public function __construct()
    {
        $this->spel = new ArrayCollection();
        $this->spels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getLeeftijd(): ?string
    {
        return $this->leeftijd;
    }

    public function setLeeftijd(string $leeftijd): self
    {
        $this->leeftijd = $leeftijd;

        return $this;
    }


    /**
     * @return Collection|Spel[]
     */
    public function getSpels(): Collection
    {
        return $this->spels;
    }

    public function addSpel(Spel $spel): self
    {
        if (!$this->spels->contains($spel)) {
            $this->spels[] = $spel;
            $spel->setSpeler($this);
        }

        return $this;
    }

    public function removeSpel(Spel $spel): self
    {
        if ($this->spels->removeElement($spel)) {
            // set the owning side to null (unless already changed)
            if ($spel->getSpeler() === $this) {
                $spel->setSpeler(null);
            }
        }

        return $this;
    }

    public function getSpel(): ?Spel
    {
        return $this->spel;
    }

    public function setSpel(?Spel $spel): self
    {
        $this->spel = $spel;

        return $this;
    }
}
