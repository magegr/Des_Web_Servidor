<?php

namespace AP51\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use AP51\Repository\ProductRepository;

#[Entity(repositoryClass: ProductRepository::class)]
#[Table(name: 'PRODUCTO')]
class product
{
    #[id]
    #[generatedvalue (strategy: 'NONE')]
    #[Column(name: 'PROD_NUM', type: 'integer', length: 6, nullable: false)]
    private int $id;


    #[OneToMany(targetEntity: Orderdetail::class, mappedBy: 'product')]
    private Collection $details;

    public function __construct()
    {
        $this->details = new ArrayCollection();
    }

    #[Column(name: 'DESCRIPCION', type: 'text', length: 255, unique: true, nullable: false)]
    private string $description;

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

}