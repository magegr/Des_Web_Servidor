<?php

namespace AP33\views;
//no necesita use
class view
{
    public function render($tareas)//le pasamos un array como parametro
    {
        foreach ($tareas as $tarea) {
            foreach ($tarea as $key => $value) {
                if ($key == 'fecha_creacion' || $key == 'fecha_vencimiento' || $key == 'id') {
                    echo $key . ' : ' . $value;
                    echo '<br>';
                }
            }
            echo '<br>';
        }
//aqui solo tenemos que mostrar
    }

    public function render2($tareas)//le pasamos un array como parametro
    {
        foreach ($tareas as $tarea) {
            foreach ($tarea as $key => $value) {
                echo $key . ': ' . $value;
                echo '<br>';
            }
        }
//aqui solo tenemos que mostrar
    }
}