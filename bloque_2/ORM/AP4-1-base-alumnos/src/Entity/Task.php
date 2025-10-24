<?php

namespace AP41\Entity;
//revisar el composer,json para ver que esta tod bien
//hacer un dumpautoload
use AP41\Repository\TaskRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use  dateTime;

#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'Tareas')]
class Task
{
    #[id]
    #[generatedvalue]
    #[Column(name: 'id', type: 'integer')]
    private int $id;

    #[Column(name: 'titulo', type: 'string')]
    private string $title;
    #[Column(name: 'descripcion', type: 'string')]
    private string $description;

    #[Column(name: 'fecha_creacion', type: 'date')]
    private Datetime $fechaCreacion;
    #[Column(name: 'fecha_vencimiento', type: 'date')]
    private DateTime $fechaVencimiento;

    public function getTitulo(): string  //obtener datos
    {
        return $this->title;
    }

    public function setTitulo(string $name): void //asignar valores
    {
        $this->title = $name;
    }

    public function getDescripcion(): string  //obtener datos
    {
        return $this->description;
    }

    public function setDescripcion(string $description): void //asignar valores
    {
        $this->description = $description;
    }

    public function getFechaCreacion(): DateTime
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(DateTime $fecha_creacion): void
    {
        $this->fechaCreacion = $fecha_creacion;
    }

    public function getFechaVencimiento(): DateTime//no barra baja
    {
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento(DateTime $fecha_vencimiento): void
    {
        $this->fechaVencimiento = $fecha_vencimiento;
    }

    public function getId(): int
    {
        return $this->id;
    }


}