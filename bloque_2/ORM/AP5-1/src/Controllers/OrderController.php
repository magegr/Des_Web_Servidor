<?php

namespace AP51\Controllers;

use AP51\Core\EntityManager;
use AP51\Entity\order;
use AP51\Repository\OrderRepository;
use AP51\Views\OrderView;
use AP51\Entity\Orderdetail;
use AP51\Views\OrderDetailView;

class OrderController
{
    private EntityManager $entityManager;
    private OrderRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Order::class);
    }

    public function list(): void
    {
        $Order = $this->repository->findAll();
        $view = new OrderView($Order);
        $view->render($Order);
    }

    //llamamos al controller para que nos lea la ruta

    public function crud(...$params): void //cojo por parametro infinito parametros / es diferente de un array
    {
        $action = $params[0] ?? null; //le digo que la posicion  0 es la accion
        $id = $params[1] ?? null;// es el id

        switch ($action) {
            case 'read':
                $this->detail($id); //llamamos a la funcion
                break;
            default:
                $this->noRuta();
        }
    }

    //Para cuando le pinches en el numero te saque el detale del pedido
    public function detail(?string $id): void //le tenemos que decir que puede ser una cadena de texto y lo que devuelve que en este caso void
    {
        $orderId = intval($id);//lo volvemos a convertir en numero
        $order = $this->repository->find($orderId);

        //Si es nulo entonces me lleva a el error 404
        if (!$order) {
            $this->noRuta();
        }

        $details = $order->getDetails(); //porque getDetail? es la relacioon que hay entre las dos tablas es la colection donded nos devuelve un colection de detail

        $view = new OrderDetailView();
        $view->render($details);//esto es un collection
        //si le quisisera pasar un array  $view->render([...$details])
    }

    private function noRuta(): void
    {
        (new MainController)->noRuta();
    }
}