<?php
$datos = [];
if (isset($_GET)){ //comprobar si existe primero
    $datos= $_GET;//cambiar , no hace falta poner todas las cosas , no es practico
}


foreach ($datos as $key => $value) {
    echo 'Se ha recibido el valor '. $value.' para la clave'. $key.'<br>';
}
?>