<?php

namespace App\Entity;

use App\Repository\BookingsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BookingsRepository::class)]

class Bookings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('booking:read')]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('booking:read')]
    private ?Traveler $traveler_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups('booking:read')]
    private ?\DateTimeInterface $booking_date = null;

    #[ORM\Column(length: 255)]
    #[Groups('booking:read')]
    private ?string $statut = null;

    #[ORM\ManyToOne(inversedBy: 'bookings')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('booking:read')]
    private ?Trips $trip_id = null;

    #[ORM\ManyToOne(inversedBy: 'booking_id')]
    #[Groups('booking:read')]
    private ?Payment $payment = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTravelerId(): ?Traveler
    {
        return $this->traveler_id;
    }

    public function setTravelerId(?Traveler $traveler_id): static
    {
        $this->traveler_id = $traveler_id;

        return $this;
    }

    public function getBookingDate(): ?\DateTimeInterface
    {
        return $this->booking_date;
    }

    public function setBookingDate(\DateTimeInterface $booking_date): static
    {
        $this->booking_date = $booking_date;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTripId(): ?Trips
    {
        return $this->trip_id;
    }

    public function setTripId(?Trips $trip_id): static
    {
        $this->trip_id = $trip_id;

        return $this;
    }

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): static
    {
        $this->payment = $payment;

        return $this;
    }
}
