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
use Doctrine\ORM\Mapping\OneToMany;
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

    #[column(name: 'ip', type: 'string', length: 39, nullable: false)]
    private string $ip;

    #[column(name: 'date_connection', type: 'datetime', nullable: false)]
    private DateTime $date_connection;

//server_id pero es foreingkey

}