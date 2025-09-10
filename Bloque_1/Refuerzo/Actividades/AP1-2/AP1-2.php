<?php
$datos = [];
$datos= [$_GET['hola'] ?? null, $_GET['clave'] ?? null, $_GET['clave2'] ?? null];//si no existe se toma como nulo

foreach ($datos as $key => $value) { //el orden importa
    if (is_null($value)){
        echo 'No se ha recibido ningún dato o es un valor nulo  <br>';
    }elseif (is_numeric($value)){
        echo 'Se ha recibido un número <br>';
    }else{
        echo ' Se ha recibido una cadena de caracteres<br>';
    }
}
?>