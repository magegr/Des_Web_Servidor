<?php

namespace AP52\Entity;

use AP52\Repository\ServerRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: ServerRepository::class)]
#[Table(name: 'servers')]
class Server
{
    #[id]
    #[generatedvalue]
    #[Column(name: 'id', type: 'integer', nullable: false)]
    private $id;

    //onetomany y la collection


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
}