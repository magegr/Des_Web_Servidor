<?php
//creamos una nueva conexion a la base de datos y despues sacamos la infiormacion que queramos
require_once __DIR__ . "/../core/Database.php";

class Tarea
{
    private $conn;

    public function __construct()
    { //datos para la nueva conexion esto tendria que estar en json
        $db = DatabaseConnection::getInstance();//me estoy creando la conexion
        $this->conn = $db->getConexion();//devueklve la conexion
    }

    c
}