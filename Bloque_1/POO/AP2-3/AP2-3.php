<?php
class DatabaseConnection {
    private  static $instancia = null;
    private $conn;

    //permite que nadie pueda acceder al construct / crea y configura
    private function __construct($host, $user, $password, $dbname) {
        $this->connection = new mysqli($host, $user, $password, $dbname);

        if ($this->connection->connect_error) {
            die("Error de conexión: " . $this->connection->connect_error);
        }
    }
    //si ya hay una instancia nada y de no ser asi llama al constructor de arriba
    public static function getInstance($host, $user, $password, $dbname) {
        if (self::$instancia === null) {
            self::$instancia = new DatabaseConnection($host, $user, $password, $dbname);
        }
        return self::$instancia;
    }
    // Método para acceder a la conexión
    public function getConexion() {
        return $this->conexion;
    }
    public function __destruct() {
        // Cerramos la conexión con la base de datos
        $this->conn->close();
    }
}