<?php
// Incluir el controlador
require_once __DIR__ . '/../src/controllers/controller.php';

// Instanciar el controlador y ejecutar la acción de mostrar productos
$controlador = new Controller();
$controlador->mostrar();