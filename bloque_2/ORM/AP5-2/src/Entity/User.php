<?php

namespace AP52\Entity;

use AP52\Repository\UserRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(RepositoryClass: UserRepository::Class)]
#[Table(name: 'users')]
class user
{
    #[id]
    #[generatedvalue]
    #[Column(name: 'id', type: 'integer', nullable: false)]
    private $id;

    //onetomany y la collection

    #[Column(name: 'username', type: 'varchar', length: '30', nullable: false)]
    private string $username;

    #[Column(name: 'first_subname', type: 'varchar', length: '100', nullable: false)]
    private string $first_subname;

    #[Column(name: 'second_subname', type: 'varchar', length: '100', nullable: true)]
    private ?string $second_subname = null;

    #[Column(name: 'address', type: 'varchar', length: '250', nullable: true)]
    private ?string $address = null;

    #[Column(name: 'telephone', type: 'varchar', length: '13', nullable: true)]
    private ?string $telephone = null;

    #[Column(name: 'city', type: 'varchar', length: '250', nullable: true)]
    private ?string $city = null;

    #[Column(name: 'country', type: 'varchar', length: '4', nullable: false)]
    private string $country;

    #[Column(name: 'observation', type: 'text', nullable: true)]
    private ?string $observation = null;

    #[Column(name: 'email', type: 'varchar', length: '250', nullable: false)]
    private string $email;

    #[Column(name: 'name', type: 'varchar', length: '30', nullable: false)]
    private string $name;
}