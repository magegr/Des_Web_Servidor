<?php
require_once __DIR__ . '/../models/Tarea.php'; // Usa __DIR__ para obtener la ruta correcta.
require_once __DIR__ . "/../views/ListadoTareas.php";

class TareasController
{
    public function mostrarTarea()
    {
        $tarea = new Tarea();//tareas
        $vista = new ListadoTareas();//nueva vista
        $tareas = $tarea->getTareas();//$tareas tiene toda la info de la base dde datos
        $listar = $vista->mostrarTareas($tareas);//Le pasa la infoormacion a la funcion de vista
    }

}