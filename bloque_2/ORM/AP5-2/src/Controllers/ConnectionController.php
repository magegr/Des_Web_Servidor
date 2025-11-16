<?php

namespace AP52\Controllers;

use AP52\Core\EntityManager;
use AP52\Entity\Connecction;
use AP52\Repository\ConnectionRepository;
use AP52\Views\ConnectionView;

class ConnectionController
{
//todaas las conexiones y nombre completo del usuario, el email del
//usuario, la url del servidor, la ip de la coneción y la fecha de la
//conexión

//Solo de crear una nueva conexion

    private EntityManager $entityManager;
    private ConnectionRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Connecction::class);
    }

    public function crud(...$params): void
    {
        $action = $params[0] ?? null; //le digo que la posicion  0 es la accion
        $id = $params[1] ?? null;// es el id
        switch ($action) {
            case 'read':
                $this->list();
                break;
            case 'create':
                $this->create();
                break;
            default:
                $this->noRuta();

        }
    }

    public function list(): void
    {
        $conecction = $this->repository->findAll();
        $view = new ConnectionView();
        $view->render($conecction);
    }


}