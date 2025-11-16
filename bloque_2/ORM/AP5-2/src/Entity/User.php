<?php

namespace AP52\Entity;

use AP52\Repository\UserRepository;
use AP52\Entity\Connecction;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: UserRepository::Class)]
#[Table(name: 'users')]
class user
{
    #[id]
    #[generatedvalue]
    #[Column(name: 'id', type: 'integer', nullable: false)]
    private int $id;

    //onetomany y la collection
    #[OneToMany(targetEntity: Connecction::class, mappedBy: 'user',)]
    private Collection $connections;

    public function __construct()
    {
        $this->connections = new ArrayCollection();
    }

    #[Column(name: 'username', type: 'string', length: '30', nullable: false)]
    private string $username;

    #[Column(name: 'first_subname', type: 'string', length: '100', nullable: false)]
    private string $first_subname;

    #[Column(name: 'second_subname', type: 'string', length: '100', nullable: true)]
    private ?string $second_subname = null;

    #[Column(name: 'address', type: 'string', length: '250', nullable: true)]
    private ?string $address = null;

    #[Column(name: 'telephone', type: 'string', length: '13', nullable: true)]
    private ?string $telephone = null;

    #[Column(name: 'city', type: 'string', length: '250', nullable: true)]
    private ?string $city = null;

    #[Column(name: 'country', type: 'string', length: '4', nullable: false)]
    private string $country;

    #[Column(name: 'observation', type: 'text', nullable: true)]
    private ?string $observation = null;

    #[Column(name: 'email', type: 'string', length: '250', nullable: false)]
    private string $email;

    #[Column(name: 'name', type: 'string', length: '30', nullable: false)]
    private string $name;


    public function getId(): int
    {
        return $this->id;
    }

    public function getConnections(): Collection
    {
        return $this->connections;
    }

    public function setConnections(Collection $connections): void
    {
        $this->connections = $connections;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getFirstSubname(): string
    {
        return $this->first_subname;
    }

    public function setFirstSubname(string $first_subname): void
    {
        $this->first_subname = $first_subname;
    }

    public function getSecondSubname(): ?string
    {
        return $this->second_subname;
    }

    public function setSecondSubname(?string $second_subname): void
    {
        $this->second_subname = $second_subname;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): void
    {
        $this->address = $address;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): void
    {
        $this->observation = $observation;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


}