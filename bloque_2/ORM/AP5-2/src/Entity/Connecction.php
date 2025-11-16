<?php

namespace AP52\Entity;

use AP52\Repository\ConnectionRepository;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: ConnectionRepository::class)]
#[Table(name: 'connections')]
class Connecction
{
    #[id]
    #[generatedvalue]
    #[column(name: 'id', type: 'integer', nullable: false)]
    private int $id;

//aqui user_id pero es foreingkey
    #[ManyToOne(targetEntity: User::class, inversedBy: 'connections')]
    #[JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false)]
    private User $user;

    #[column(name: 'ip', type: 'string', length: 39, nullable: false)]
    private string $ip;

    #[column(name: 'date_connection', type: 'datetime', nullable: false)]
    private DateTime $date_connection;

    #[ManyToOne(targetEntity: Server::class, inversedBy: 'connections')]
    #[JoinColumn(name: 'server_id', referencedColumnName: 'id', nullable: false)]
    private Server $Server;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    public function getDateConnection(): DateTime
    {
        return $this->date_connection;
    }

    public function setDateConnection(DateTime $date_connection): void
    {
        $this->date_connection = $date_connection;
    }

    public function getServer(): Server
    {
        return $this->Server;
    }

    public function setServer(Server $Server): void
    {
        $this->Server = $Server;
    }

}