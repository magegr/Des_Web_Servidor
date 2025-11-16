<?php

namespace AP51\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use AP51\Repository\OrderDetailRepository;

#[Entity(repositoryClass: OrderDetailRepository::class)]
#[Table(name: 'DETALLE')]
class Orderdetail
{
    #[id]
    #[Column(name: 'DETALLE_NUM', type: 'smallint', length: 4, nullable: false)]
    private int $id;

    #[id]
    #[ManyToOne(targetEntity: order::class, inversedBy: 'details')]
    #[JoinColumn(name: 'PEDIDO_NUM', referencedColumnName: 'PEDIDO_NUM', nullable: false)]
    private order $order;

    #[ManyToOne(targetEntity: product::class, inversedBy: 'details')]
    #[JoinColumn(name: 'PROD_NUM', referencedColumnName: 'PROD_NUM', nullable: false)]
    private product $product;

    #[Column(name: 'PRECIO_VENTA', type: 'decimal', precision: 8, scale: 2, nullable: true)]
    private ?float $price = null;

    #[Column(name: 'CANTIDAD', type: 'integer', length: 8, nullable: true)]
    private ?int $quantity = null;

    #[Column(name: 'IMPORTE', type: 'decimal', precision: 8, scale: 2, nullable: true)]
    private ?float $importe = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getOrder(): order
    {
        return $this->order;
    }

    public function getProduct(): product
    {
        return $this->product;
    }

    public function setProduct(product $product): void
    {
        $this->product = $product;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getImporte(): ?float
    {
        return $this->importe;
    }

    public function setImporte(?float $importe): void
    {
        $this->importe = $importe;
    }


}