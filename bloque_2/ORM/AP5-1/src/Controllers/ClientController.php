<?php

namespace AP51\Controllers;

use AP51\Core\EntityManager;
use AP51\Entity\Client;
use AP51\Views\ClientView;

class ClientController
{
    public function list()
    {
        $entityManager = new EntityManager();
        $CustomerRepository = $entityManager->getEntityManager()->getRepository(client::class);
        $Customer = $CustomerRepository->findAll();
        $view = new ClientView($Customer);
        $view->render($Customer);
    }
}