<?php
$datos = [];
$datos= [$_GET['hola'] , $_GET['clave'] , $_GET['clave2']];

foreach ($datos as $key => $value) {
    echo 'Se ha recibido el valor '. $value.' para la clave'. $key.'<br>';
}
?>