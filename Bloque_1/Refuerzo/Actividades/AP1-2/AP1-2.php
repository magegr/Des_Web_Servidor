<?php
$datos = [];
if (isset($_GET)){ //comprobar si existe primero
    $datos= $_GET ;//cambiar , no hace falta poner todas las cosas , no es practico
}
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