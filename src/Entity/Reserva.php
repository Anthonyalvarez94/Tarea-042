<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lugar = null;

    #[ORM\Column]
    private ?float $costo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaReserva = null;

    #[ORM\ManyToOne(inversedBy: 'reservas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $usuario = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLugar(): ?string
    {
        return $this->lugar;
    }

    public function setLugar(string $lugar): static
    {
        $this->lugar = $lugar;

        return $this;
    }

    public function getCosto(): ?float
    {
        return $this->costo;
    }

    public function setCosto(float $costo): static
    {
        $this->costo = $costo;

        return $this;
    }

    public function getFechaReserva(): ?\DateTimeInterface
    {
        return $this->fechaReserva;
    }

    public function setFechaReserva(\DateTimeInterface $fechaReserva): static
    {
        $this->fechaReserva = $fechaReserva;

        return $this;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): static
    {
        $this->usuario = $usuario;

        return $this;
    }
}
