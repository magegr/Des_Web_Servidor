<?php

namespace AP42\Entity;

//revisar el composer,json para ver que esta tod bien
//hacer un dumpautoload
use AP42\Repository\OperationRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity(repositoryClass: OperationRepository::class)]
#[Table(name: 'operaciones')]
class Operation
{
    #[id]
    #[generatedvalue]
    #[Column(name: 'id', type: 'integer')]
    private int $id;

    #[Column(name: 'resultado', type: 'decimal')]
    private float $result;

    #[ManyToOne(targetEntity: User::class, inversedBy: 'operaciones')]
    #[JoinColumn(name: 'usuario', referencedColumnName: 'id')]
    private ?User $usuario = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->usuario;
    }

    public function setUser(?User $user): void
    {
        $this->usuario = $user;
    }

    public function getResult(): float
    {
        return $this->result;
    }

    public function setResult(float $result): void
    {
        $this->result = $result;
    }


}