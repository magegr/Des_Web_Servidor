<?php
require_once ('AP2-1.php');
require_once ('AP2-1_1.php');
class cocheElectricoF1 extends cocheF1{
    protected $bateria;
    public function __construct($marca, $modelo, $velocidad, $combustible,$alerones,$bateria){
        parent:: __construct($marca, $modelo, $velocidad, $combustible,$alerones);
        $this->bateria = $bateria;
    }
    public function recargar(){
        echo "El coche se esta cargando";
    }
}