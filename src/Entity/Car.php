<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("car:read")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("car:read")]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups("car:read")]
    private ?string $marks = null;

    #[ORM\Column(length: 255)]
    #[Groups("car:read")]
    private ?string $number = null;

    #[ORM\Column(length: 255)]
    #[Groups("car:read")]
    private ?string $numberOfPlace = null;

    #[ORM\Column(length: 255)]
    #[Groups("car:read")]
    private ?string $type = null;

    /**
     * @var Collection<int, Traveler>
     */
    #[ORM\OneToMany(targetEntity: Traveler::class, mappedBy: 'car', orphanRemoval: true)]
    private Collection $travelers;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[Groups("car:read")]
    private ?Driver $driver = null;

    public function __construct()
    {
        $this->travelers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getMarks(): ?string
    {
        return $this->marks;
    }

    public function setMarks(string $marks): static
    {
        $this->marks = $marks;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getNumberOfPlace(): ?string
    {
        return $this->numberOfPlace;
    }

    public function setNumberOfPlace(string $numberOfPlace): static
    {
        $this->numberOfPlace = $numberOfPlace;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Traveler>
     */
    public function getTravelers(): Collection
    {
        return $this->travelers;
    }

    public function addTraveler(Traveler $traveler): static
    {
        if (!$this->travelers->contains($traveler)) {
            $this->travelers->add($traveler);
            $traveler->setCar($this);
        }

        return $this;
    }

    public function removeTraveler(Traveler $traveler): static
    {
        if ($this->travelers->removeElement($traveler)) {
            // set the owning side to null (unless already changed)
            if ($traveler->getCar() === $this) {
                $traveler->setCar(null);
            }
        }

        return $this;
    }

    public function getDriver(): ?Driver
    {
        return $this->driver;
    }

    public function setDriver(?Driver $driver): static
    {
        $this->driver = $driver;

        return $this;
    }
}
