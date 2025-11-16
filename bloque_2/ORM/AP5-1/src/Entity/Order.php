<?php

namespace AP51\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use AP51\Repository\OrderRepository;

#[Entity(repositoryClass: OrderRepository::class)]
#[Table(name: 'PEDIDO')]
class order
{
    #[id]
    #[generatedvalue (strategy: 'NONE')]
    #[Column(name: 'PEDIDO_NUM', type: 'smallint', length: 4, nullable: false)]
    private int $id;

    #[OneToMany(targetEntity: OrderDetail::class, mappedBy: 'order',)]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }


    #[Column(name: 'PEDIDO_FECHA', type: 'date', nullable: true)]
    private DateTime $date;

    #[Column(name: 'PEDIDO_TIPO', type: 'string', nullable: true)]
    private ?string $type = null;

    #[ManyToOne(targetEntity: Client::class, inversedBy: 'orders')]
    #[JoinColumn(name: 'CLIENTE_COD', referencedColumnName: 'CLIENTE_COD', nullable: false)]
    private Client $client;

    #[Column(name: 'FECHA_ENVIO', type: 'date', nullable: true)]
    private ?DateTime $date_envio = null;

    #[Column(name: 'TOTAL', type: 'decimal', precision: 8, scale: 2, nullable: true)]
    private ?float $total = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function setDetails(Collection $details): void
    {
        $this->details = $details;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function getDateEnvio(): DateTime
    {
        return $this->date_envio;
    }

    public function setDateEnvio(DateTime $date_envio): void
    {
        $this->date_envio = $date_envio;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

}