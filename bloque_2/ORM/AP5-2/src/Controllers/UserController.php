<?php

namespace AP52\Controllers;

use AP52\Core\EntityManager;
use AP52\Entity\user;
use AP52\Repository\UserRepository;
use AP52\Views\FormUserView;
use AP52\Views\UserView;

class UserController
{
//crud entero

    private EntityManager $entityManager;
    private UserRepository $repository;

    public function __construct()
    {
        $this->entityManager = new EntityManager();
        $this->repository = $this->entityManager->getEntityManager()->getRepository(User::class);
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

    public function list(): void
    {
        $users = $this->repository->findAll();
        $view = new UserView();
        $view->render($users);
    }

    public function create(): void
    {
        if (isset($_POST['submit'])) {
            // Validar campos requeridos
            if (!isset($_POST['url'], $_POST['country_server'], $_POST['domain']) ||
                empty($_POST['url']) || empty($_POST['country_server']) ||
                empty($_POST['domain'])) {
                $this->noRuta();
                return;
            }

            $User = new User();

            $server->setIp($_POST['ip'] ?? null);

            $em = $this->entityManager->getEntityManager();
            $em->persist($User);
            $em->flush();

            $this->list();
        } else {
            $view = new FormUserView();
            $view->render(false, null);
        }
    }

    public function update($id): void
    {
        $serverId = intval($id);
        $server = $this->repository->find($serverId);

        if (!$server) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {
            if (!isset($_POST['url'], $_POST['country_server'], $_POST['domain']) ||
                empty($_POST['url']) || empty($_POST['country_server']) ||
                empty($_POST['domain'])) {
                $this->noRuta();
                return;
            }

            $server->setUrl($_POST['url']);
            $server->setCountryServer($_POST['country_server']);
            $server->setObservation($_POST['observation'] ?? null);
            $server->setDomain($_POST['domain']);
            $server->setIp($_POST['ip'] ?? null);

            $em = $this->entityManager->getEntityManager();
            $em->flush();

            $this->list();
        } else {
            $view = new FormUserView();
            $view->render(true, $server);
        }
    }

    public function delete($id): void
    {
        $Id = intval($id);
        $User = $this->repository->find($Id);

        if (!$User) {
            $this->noRuta();
            return;
        }
        if (isset($_POST['confirm'])) { //si  llega algo con ese nombre
            try {
                $em = $this->entityManager->getEntityManager();
                $em->remove($User);
                $em->flush();
                $this->list();//Redirigir al listado
            } catch (\Exception $e) {//lo de exception es para el error
                $view = new DeleteUserView();
                $error = "No se puede eliminar el servidor.";
                $view->render($User, $error);
            }
        } else {
            $view = new DeleteUserView();
            $view->render($User);
        }
    }

    private function noRuta(): void
    {
        (new MainController)->noRuta();
    }
}