<?php

namespace AP51\Entity;

use AP51\Repository\ClientRepository;

//Cambia, dependiendo de en que entity este
use Doctrine\Common\Collections\ArrayCollection;

//si tenemos la parte one
use Doctrine\Common\Collections\Collection;

////si tenemos la parte one
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: ClientRepository::class)]
#[Table(name: 'CLIENTE')]
class Client
{
    #[id]
    #[generatedvalue (strategy: 'NONE')]
    #[Column(name: 'CLIENTE_COD', type: 'integer', nullable: false)]
    private int $id;

    #[OneToMany(targetEntity: order::class, mappedBy: 'client')]
    private Collection $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    #[Column(name: 'NOMBRE', type: 'string', length: 45, nullable: false)]
    private string $name;

    #[Column(name: 'DIREC', type: 'string', length: 40, nullable: false)]
    private string $address;

    #[Column(name: 'CIUDAD', type: 'string', length: 30, nullable: false)]
    private string $city;

    #[Column(name: 'ESTADO', type: 'string', length: 2, nullable: true)]
    private ?string $state = null;

    #[Column(name: 'COD_POSTAL', type: 'string', length: 9, nullable: false)]
    private string $postalCode;

    #[Column(name: 'AREA', type: 'smallint', length: 3, nullable: true)]
    private ?int $area = null;

    #[Column(name: 'TELEFONO', type: 'string', length: 9, nullable: true)]
    private ?string $phone = null;

    #[Column(name: 'REPR_COD', type: 'smallint', nullable: true)]
    private ?int $representative = null;
    //Codigo representante
    #[Column(name: 'LIMITE_CREDITO', type: 'decimal', precision: 9, scale: 2, nullable: true)]
    private ?float $limitCredito = null;

    #[Column(name: 'OBSERVACIONES', type: 'text', length: 255, nullable: true)]
    private ?string $observations = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(?int $area): void
    {
        $this->area = $area;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getRepresentative(): ?int
    {
        return $this->representative;
    }

    public function setRepresentative(?int $representative): void
    {
        $this->representative = $representative;
    }

    public function getLimitCredito(): ?float
    {
        return $this->limitCredito;
    }

    public function setLimitCredito(?float $limitCredito): void
    {
        $this->limitCredito = $limitCredito;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(?string $observations): void
    {
        $this->observations = $observations;
    }
}