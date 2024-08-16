<?php

namespace App\Entity;

use App\Repository\DriverRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DriverRepository::class)]
class Driver
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("driver:read")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("driver:read")]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups("driver:read")]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    #[Groups("driver:read")]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    #[Groups("driver:read")]
    private ?string $permis = null;

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

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPermis(): ?string
    {
        return $this->permis;
    }

    public function setPermis(string $permis): static
    {
        $this->permis = $permis;

        return $this;
    }
}
