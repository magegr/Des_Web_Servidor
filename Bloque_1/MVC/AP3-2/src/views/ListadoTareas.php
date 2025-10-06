<?php
class ListadoTareas
{
public function mostrarTareas($tareas){
    while ($row = $tareas->fetch_assoc()) {
        echo "La tarea " . $row["titulo"] . ", con id: " . $row["id"] . ", con descripcion: " . $row["descripcion"] . ", tienen fecha de creacion " . $row["fecha_creacion"] . " y fecha de vencimiento " . $row["fecha_vencimiento"] . "<br>";
    }
}
}