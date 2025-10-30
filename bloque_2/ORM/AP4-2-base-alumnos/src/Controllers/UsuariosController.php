<?php

namespace AP42\Controllers;

use AP42\Core\EntityManager;
use AP42\Entity\User;
use AP42\Views\ListadoUsuarios;

class UsuariosController
{
    public function list()
    {

        $entityManager = new EntityManager();
        $UserRepository = $entityManager->getEntityManager()->getRepository(User::class);
        $User = $UserRepository->findAll();
        $view = new ListadoUsuarios();
        $view->render($User);

    }
}