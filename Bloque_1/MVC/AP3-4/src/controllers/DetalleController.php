<?php

namespace AP33\controllers;
//nombre de la carpeta en la que estoy

use AP33\views\view;
use AP33\Models\tareas;

//nombre de la carpeta y luego el de la clase

class DetalleController //SE TIENE QUE LLAMAR IGUAL QUE EN JSON
{
    public function detail()
    {
        $tarea = new Tareas();
        $tareas = $tarea->findAll();
        $view = new view();
        $view->render2($tareas);
    }
}