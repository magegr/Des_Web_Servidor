<?php
$numeros=[];
$numeros=[
    1 => "primero",
    3 => "segundo",
    5 => "tercero",
    7 => "cuarto",
    9 => "quinto",
    11 => "sexto",
];
$posicion=1;
$suma=0;
foreach ($numeros as $numero => $nombre) {
    if ($posicion % 2 == 0) {
        echo 'Estas en una posición par';
        $impar=false;
        $par=true;
    }else {
        echo 'Estas en una posición impar';
        $impar = true;
        $par = false;
    }
    $suma=$suma+$numero;
    echo '<br>'.'La suma es '.$suma.'<br>';

    if ($suma > 20){
        echo 'El valor de la suma es mayor que 20'.'<br>';
    }elseif ($suma > 10){
        echo 'El valor de la suma es mayor que 10'.'<br>';
    }elseif ($suma > 5){
        echo 'El valor de la suma es mayor que 5'.'<br>';
    }
    $posicion++;
}
?>