<?php

namespace AP51\Controllers;

use AP51\Core\EntityManager;
use AP51\Entity\product;
use AP51\Repository\ProductRepository;
use AP51\Views\ProductDeleteview;
use AP51\Views\ProductView;
use AP51\Views\ProductFormview;

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

    public function crud(...$params): void
    {
        $action = $params[0] ?? null; //le digo que la posicion  0 es la accion
        $id = $params[1] ?? null;// es el id
        switch ($action) {
            case 'create':
                $this->create();
                break;
            case 'update':
                $this->update($id);
                break;
            case 'delete':
                $this->delete($id);
                break;
            default:
                $this->noRuta();

        }
    }

    public function create(): void
    {
        if (isset($_POST['submit'])) {
            // Validar que los campos requeridos si hay mas campos tiene que eñadirlo , mirar bien si permite nulos, en caso de no permitirlos hay que pedirlo
            //aqui solo pedimos el id y la ddescripcio0n porque son los unicos campos y no permiten null
            if (!isset($_POST['id']) || !isset($_POST['description']) ||
                empty($_POST['id']) || empty($_POST['description'])) {
                $this->noRuta();
                return;
            }

            $id = intval($_POST['id']);//transformamos el id a numero

            // Verificar que el ID no exista ya
            $existProduct = $this->repository->find($id);
            if ($existProduct) {
                // El producto ya existe, mostrar error o redirigir
                $this->list();
                return;
            }

            $product = new Product();//Aqui estoy llamando al entity
            $product->setId($id);//asegurarse que tengo creado un setId en el entity al que le quiero crear el producto (product)
            $product->setDescription($_POST['description']);//añado la descripcion

            $em = $this->entityManager->getEntityManager();
            $em->persist($product);
            $em->flush();
            $this->list();
        } else {
            $view = new ProductFormView();
            $view->render(false, null);
        }
    }

    public function update(string $id): void
    {
        $Id = intval($id);
        $product = $this->repository->find($Id);

        if (!$product) {
            $this->noRuta();
            return;
        }
        if (isset($_POST['submit'])) {//vemos si ha llegado algo por post
            if (!isset($_POST['description']) || empty($_POST['description'])) { //si no le has pasado la descripcion
                $this->noRuta();
                return;
            }

            $product->setDescription($_POST['description']); //moodificamos la descripcion

            $em = $this->entityManager->getEntityManager();
            $em->flush();
            $this->list();//nos lleva a la vista otra vez
        } else {
            $view = new ProductFormView();
            $view->render(true, $product);
        }
    }

    public function delete(string $id): void
    {
        $Id = intval($id);
        $product = $this->repository->find($Id);

        if (!$product) {
            $this->noRuta();
            return;
        }
        if (isset($_POST['confirm'])) { //si  llega algo con ese nombre
            try {
                $em = $this->entityManager->getEntityManager();
                $em->remove($product);
                $em->flush();
                $this->list();//Redirigir al listado
            } catch (\Exception $e) {//lo de exception es para el error
                $view = new ProductDeleteView();
                $error = "No se puede eliminar el producto.";
                $view->render($product, $error);
            }
        } else {
            $view = new ProductDeleteView();
            $view->render($product);
        }
    }

    private function noRuta(): void
    {
        (new MainController)->noRuta();
    }
}