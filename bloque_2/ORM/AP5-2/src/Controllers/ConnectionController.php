<?php

namespace AP52\Controllers;

use AP52\Core\EntityManager;
use AP52\Entity\Connecction;
use AP52\Entity\User;
use AP52\Entity\Server;
use AP52\Repository\ConnectionRepository;
use AP52\Views\ConnectionView;
use AP52\Views\FormConnectionView;
use AP52\Repository\UserRepository;
use AP52\Repository\ServerRepository;

class ConnectionController
{
//todaas las conexiones y nombre completo del usuario, el email del
//usuario, la url del servidor, la ip de la coneción y la fecha de la
//conexión

//Solo de crear una nueva conexion

    private EntityManager $entityManager;
    private ConnectionRepository $repository;
    private UserRepository $userRepository;
    private ServerRepository $serverRepository;


    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(Connecction::class);
        $em = $this->entityManager->getEntityManager();
        $this->userRepository = $em->getRepository(User::class);
        $this->serverRepository = $em->getRepository(Server::class);
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

    public function create(): void
    {
        if (isset($_POST['submit'])) {
            // Validar campos requeridos
            if (!isset($_POST['user_id'], $_POST['server_id'], $_POST['ip'],
                    $_POST['date_connection']) ||
                empty($_POST['user_id']) || empty($_POST['server_id']) ||
                empty($_POST['ip']) || empty($_POST['date_connection'])) {
                $this->noRuta();
                return;
            }

            $userId = intval($_POST['user_id']);
            $serverId = intval($_POST['server_id']);
//buscame si existe
            $user = $this->userRepository->find($userId);
            $server = $this->serverRepository->find($serverId);
//si existe te sales
            if (!$user || !$server) {
                $this->noRuta();
                return;
            }
            try {
                $dateConnection = new \DateTime($_POST['date_connection']);
            } catch (\Exception $e) {
                $this->noRuta();
                return;
            }
            $connection = new Connecction();//Aqui estoy llamando al entity
            $connection->setuser($user);
            $connection->setServer($server);
            $connection->setIp($_POST['ip']);
            $connection->setDateConnection($dateConnection);

            $em = $this->entityManager->getEntityManager();
            $em->persist($connection);
            $em->flush();
            $this->list();
        } else {
            // Obtener usuarios y servidores para los desplegables
            $users = $this->userRepository->findAll();
            $servers = $this->serverRepository->findAll();


            $view = new FormConnectionView();
            $view->render($users, $servers);
        }

    }

    private function noRuta(): void
    {
        (new MainController)->noRuta();
    }

}