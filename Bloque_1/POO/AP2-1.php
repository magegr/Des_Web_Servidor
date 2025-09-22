<?php
class VehiculoCarrera
{
    //Atributos del coche de carrera
    protected $marca;
    protected $modelo;
    protected $velocidad;
    protected $combustible;

    public function __construct($marca, $modelo, $velocidad, $combustible)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->combustible = $combustible;
    }
    //Método que reduce el combustible al moverse el coche
    protected function consumirCombustible($combustible2){
        $totalCombustible = $this->combustible - $combustible2;
        if($totalCombustible < 20){
            echo "Tienes que repostar";
        }elseif($totalCombustible < 0){
            $this->detener();
        }

    }
    //Método arranca el coche
    public function arrancar(){
        echo "El coche $this->marca y $this->modelo ha sido arrancado";
    }
    //Método acelera el coche
    public function acelerar( $velocidad2){
        $velocidadTotal= $this->velocidad + $velocidad2;
        echo "La velocidad total del coche $this->marca , $this->modelo es $velocidadTotal";
    }
    //Método detener el coche
    public function detener(){
        echo "El coche $this->marca y $this->modelo ha sido detener";
    }
    //Método mostrar el coche
    public function mostrarEstado(){
        echo "El estado actual del coche es {$this->modelo}{$this->marca}{$this->velocidad}{$this->combustible}";
    }
    public function __destruct()
    {
        echo "El coche {$this->modelo} se ha retirado de la carrera";
    }
}