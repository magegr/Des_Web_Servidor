<?php

namespace AP52\Controllers;

use AP52\Core\EntityManager;
use AP52\Entity\user;
use AP52\Repository\UserRepository;
use AP52\Views\DeleteUserView;
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

    private function create(): void
    {
        if (isset($_POST['submit'])) {
            // Validar campos requeridos
            if (!isset($_POST['username'], $_POST['name'], $_POST['first_subname'],
                    $_POST['country'], $_POST['email']) ||
                empty($_POST['username']) || empty($_POST['name']) ||
                empty($_POST['first_subname']) || empty($_POST['country']) ||
                empty($_POST['email'])) {
                $this->noRuta();
                return;
            }

            $user = new User();
            $user->setUsername($_POST['username']);
            $user->setName($_POST['name']);
            $user->setFirstSubname($_POST['first_subname']);
            $user->setSecondSubname($_POST['second_subname'] ?? null);
            $user->setAddress($_POST['address'] ?? null);
            $user->setTelephone($_POST['telephone'] ?? null);
            $user->setCity($_POST['city'] ?? null);
            $user->setCountry($_POST['country']);
            $user->setObservation($_POST['observation'] ?? null);
            $user->setEmail($_POST['email']);

            $em = $this->entityManager->getEntityManager();
            $em->persist($user);
            $em->flush();

            $this->list();
        } else {
            $view = new FormUserView();
            $view->render(false, null);
        }
    }

    private function update(?string $id): void
    {
        $userId = intval($id);
        $user = $this->repository->find($userId);

        if (!$user) {
            $this->noRuta();
            return;
        }

        if (isset($_POST['submit'])) {
            if (!isset($_POST['username'], $_POST['name'], $_POST['first_subname'],
                    $_POST['country'], $_POST['email']) ||
                empty($_POST['username']) || empty($_POST['name']) ||
                empty($_POST['first_subname']) || empty($_POST['country']) ||
                empty($_POST['email'])) {
                $this->noRuta();
                return;
            }

            $user->setUsername($_POST['username']);
            $user->setName($_POST['name']);
            $user->setFirstSubname($_POST['first_subname']);
            $user->setSecondSubname($_POST['second_subname'] ?? null);
            $user->setAddress($_POST['address'] ?? null);
            $user->setTelephone($_POST['telephone'] ?? null);
            $user->setCity($_POST['city'] ?? null);
            $user->setCountry($_POST['country']);
            $user->setObservation($_POST['observation'] ?? null);
            $user->setEmail($_POST['email']);

            $em = $this->entityManager->getEntityManager();
            $em->flush();

            $this->list();
        } else {
            $view = new FormUserView();
            $view->render(true, $user);
        }
    }


    public function delete(?string $id): void
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