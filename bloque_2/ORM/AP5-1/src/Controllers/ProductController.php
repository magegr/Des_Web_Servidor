<?php

namespace AP51\Controllers;

use AP51\Core\EntityManager;
use AP51\Entity\product;
use AP51\Repository\ProductRepository;
use AP51\Views\ProductView;

class ProductController
{
    private EntityManager $entityManager;
    private ProductRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Product::class);
    }

    public function list(): void
    {
        $products = $this->repository->findAll();
        $view = new ProductView($products);
        $view->render($products);
    }

}