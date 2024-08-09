<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('payement:read')]
    private ?int $id = null;

    /**
     * @var Collection<int, bookings>
     */
    #[ORM\OneToMany(targetEntity: bookings::class, mappedBy: 'payment')]
    #[Groups('payement:read')]
    private Collection $booking_id;

    #[ORM\Column]
    #[Groups('payement:read')]
    private ?float $amount = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups('payement:read')]
    private ?\DateTimeInterface $payment_date = null;

    #[ORM\Column(length: 255)]
    #[Groups('payement:read')]
    private ?string $payment_method = null;

    public function __construct()
    {
        $this->booking_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, bookings>
     */
    public function getBookingId(): Collection
    {
        return $this->booking_id;
    }

    public function addBookingId(bookings $bookingId): static
    {
        if (!$this->booking_id->contains($bookingId)) {
            $this->booking_id->add($bookingId);
            $bookingId->setPayment($this);
        }

        return $this;
    }

    public function removeBookingId(bookings $bookingId): static
    {
        if ($this->booking_id->removeElement($bookingId)) {
            // set the owning side to null (unless already changed)
            if ($bookingId->getPayment() === $this) {
                $bookingId->setPayment(null);
            }
        }

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->payment_date;
    }

    public function setPaymentDate(\DateTimeInterface $payment_date): static
    {
        $this->payment_date = $payment_date;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->payment_method;
    }

    public function setPaymentMethod(string $payment_method): static
    {
        $this->payment_method = $payment_method;

        return $this;
    }
}
