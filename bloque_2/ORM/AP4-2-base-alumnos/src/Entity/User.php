<?php

namespace AP42\Entity;
//revisar el composer,json para ver que esta tod bien
//hacer un dumpautoload
use AP42\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: UserRepository::class)]
#[Table(name: 'usuarios')]
class User
{
    #[id]
    #[generatedvalue]
    #[Column(name: 'id', type: 'integer')]
    private int $id;


    #[Column(name: 'nombre', type: 'string', length: 255)]
    private string $name;


    #[Column(name: 'estado', type: 'integer')]
    private int $estado;

    #[OneToMany(mappedBy: 'usuario', targetEntity: Operation::class)]
    private Collection $operations;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEstado(): int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): void
    {
        $this->estado = $estado;
    }
}