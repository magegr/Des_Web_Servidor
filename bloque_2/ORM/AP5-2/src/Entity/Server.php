<?php

namespace AP52\Entity;

use AP52\Repository\ServerRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use AP52\Entity\Connecction;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: ServerRepository::class)]
#[Table(name: 'servers')]
class Server
{
    #[id]
    #[generatedvalue]
    #[Column(name: 'id', type: 'integer', nullable: false)]
    private int $id;

    //un servidor puede tener muchas conexiones
    #[OneToMany(targetEntity: Connecction::class, mappedBy: 'Server',)]
    private Collection $connections;

    public function __construct()
    {
        $this->connections = new ArrayCollection();
    }

    #[Column(name: 'url', type: 'string', length: '250', nullable: false)]
    private string $url;

    #[Column(name: 'country_server', type: 'string', length: '4', nullable: false)]
    private string $country_server;

    #[Column(name: 'observation', type: 'text', nullable: true)]
    private ?string $observation = null;

    #[Column(name: 'domain', type: 'string', length: '250', nullable: false)]
    private string $domain;

    #[Column(name: 'ip', type: 'string', length: '40', nullable: true)]
    private ?string $ip = null;


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

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getCountryServer(): string
    {
        return $this->country_server;
    }

    public function setCountryServer(string $country_server): void
    {
        $this->country_server = $country_server;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): void
    {
        $this->observation = $observation;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): void
    {
        $this->ip = $ip;
    }
}