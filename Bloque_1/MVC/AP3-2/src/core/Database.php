<?php

//Me he creado el metodo para cconectarme , pero nop he hecho ninguna conexion , eso lo hace el model
class DatabaseConnection
{//se crea 1 sola vez y se usa esa
    private $dbConfig;
    private static $instancia = null;//siempre static
    private $conn;
    //esto tenia que ser con json

    //permite que nadie pueda acceder al construct / crea y configura
    private function __construct()
    { //esto tenia que estar con el jsondecode
        $configPath = __DIR__ . '/../../config/dbConfig.json'; //le tenemos que decir de donde coger las cosas
        $dbConfig = json_decode(file_get_contents($configPath), true);//coge contenido del archivo json
        try {
            $this->conn = new mysqli(
                $dbConfig['host'],
                $dbConfig['user'],
                $dbConfig['password'],
                $dbConfig['dbname']
            );
        } catch (mysqli_sql_exception $e) {
            die("Error de conexión: " . $e->getMessage() . $e->getLine());
        }
    }

    public static function getInstance()
    {
        if (self::$instancia === null) {
            self::$instancia = new DatabaseConnection();
        }
        return self::$instancia;
    }

    // Método para acceder a la conexión
    public function getConexion()
    {
        return $this->conn;
    }
}