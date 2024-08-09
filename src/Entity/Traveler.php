<?php

namespace App\Entity;

use App\Repository\TravelerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TravelerRepository::class)]
class Traveler
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('traveler:read')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("traveler:read")]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Groups("traveler:read")]
    private ?string $lastName = null;
    #[Groups("traveler:read")]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups("traveler:read")]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups("traveler:read")]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups("traveler:read")]
    private ?string $travel_history = null;

    /**
     * @var Collection<int, Bookings>
     */
    #[ORM\OneToMany(targetEntity: Bookings::class, mappedBy: 'traveler_id', orphanRemoval: true)]
    #[Groups("traveler:read")]
    private Collection $bookings;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }
    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTravelHistory(): ?string
    {
        return $this->travel_history;
    }

    public function setTravelHistory(?string $travel_history): static
    {
        $this->travel_history = $travel_history;

        return $this;
    }

    /**
     * @return Collection<int, Bookings>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Bookings $booking): static
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings->add($booking);
            $booking->setTravelerId($this);
        }

        return $this;
    }

    public function removeBooking(Bookings $booking): static
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getTravelerId() === $this) {
                $booking->setTravelerId(null);
            }
        }

        return $this;
    }
}
