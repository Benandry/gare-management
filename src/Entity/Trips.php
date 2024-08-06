<?php

namespace App\Entity;

use App\Repository\TripsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TripsRepository::class)]
class Trips
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $depart_location = null;

    #[ORM\Column(length: 255)]
    private ?string $arrival_location = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $depart_time = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $arrival_time = null;

    #[ORM\Column]
    private ?float $price = null;

    /**
     * @var Collection<int, Bookings>
     */
    #[ORM\OneToMany(targetEntity: Bookings::class, mappedBy: 'trip_id')]
    private Collection $bookings;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartLocation(): ?string
    {
        return $this->depart_location;
    }

    public function setDepartLocation(string $depart_location): static
    {
        $this->depart_location = $depart_location;

        return $this;
    }

    public function getArrivalLocation(): ?string
    {
        return $this->arrival_location;
    }

    public function setArrivalLocation(string $arrival_location): static
    {
        $this->arrival_location = $arrival_location;

        return $this;
    }

    public function getDepartTime(): ?\DateTimeInterface
    {
        return $this->depart_time;
    }

    public function setDepartTime(\DateTimeInterface $depart_time): static
    {
        $this->depart_time = $depart_time;

        return $this;
    }

    public function getArrivalTime(): ?\DateTimeInterface
    {
        return $this->arrival_time;
    }

    public function setArrivalTime(\DateTimeInterface $arrival_time): static
    {
        $this->arrival_time = $arrival_time;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

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
            $booking->setTripId($this);
        }

        return $this;
    }

    public function removeBooking(Bookings $booking): static
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getTripId() === $this) {
                $booking->setTripId(null);
            }
        }

        return $this;
    }
}
