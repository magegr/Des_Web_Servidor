<?php
require_once ('AP2-1.php');
//Usamos extends para indicar de donde es hija
class cocheF1 extends VehiculoCarrera{

    protected $alerones;

    public function __construct($marca, $modelo, $velocidad, $combustible , $alerones) //hacemos el construct normal
    {
        parent::__construct($marca, $modelo, $velocidad, $combustible);//dentro del costruct añadimos el construct padre
        $this->alerones = $alerones;//Luego ya podemos declarar
    }
    public function activarDRS(){
        echo "El DRS del coche $this->marca y $this->modelo ha sido activado , la velocidad aumentara temporalmente";
    }

}