<?php

namespace App\Entity;

use App\Repository\SpelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpelRepository::class)
 */
class Spel
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
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Speler::class, inversedBy="spels")
     */
    private $speler;

    /**
     * @ORM\OneToMany(targetEntity=Speler::class, mappedBy="spel")
     */
    private $spelers;



    public function __construct()
    {
        $this->spelers = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSpeler(): ?Speler
    {
        return $this->speler;
    }

    public function setSpeler(?Speler $speler): self
    {
        $this->speler = $speler;

        return $this;
    }

    /**
     * @return Collection|Speler[]
     */
    public function getSpelers(): Collection
    {
        return $this->spelers;
    }

    public function addSpeler(Speler $speler): self
    {
        if (!$this->spelers->contains($speler)) {
            $this->spelers[] = $speler;
            $speler->setSpel($this);
        }

        return $this;
    }

    public function removeSpeler(Speler $speler): self
    {
        if ($this->spelers->removeElement($speler)) {
            // set the owning side to null (unless already changed)
            if ($speler->getSpel() === $this) {
                $speler->setSpel(null);
            }
        }

        return $this;
    }

}
