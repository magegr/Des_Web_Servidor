<?php

namespace AP42\Controllers;

use AP42\Core\EntityManager;
use AP42\Entity\Operation;
use AP42\Views\ListadoOperaciones;


/**
 * Controlador para la ruta /detalle
 */
class OperacionesController
{

    public function list()
    {

        $entityManager = new EntityManager();
        $OperationRepository = $entityManager->getEntityManager()->getRepository(Operation::class);
        $Operations = $OperationRepository->findAll();
        $view = new listadoOperaciones();
        $view->render($Operations);
    }
}