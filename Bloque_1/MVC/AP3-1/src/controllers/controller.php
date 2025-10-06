<?php
require_once __DIR__ . '/../model/model.php'; // Usa __DIR__ para obtener la ruta correcta.
require_once __DIR__ . "/../views/Vista.php";
class Controller
{
    public function mostrar()
    {
        // Crear instancia del modelo
        $model = new Model();
        $vista = new View();
        // Obtener todos los datos
        $models = $model->obtener();
        $listar=$vista->mostrar($models);
    }
}
