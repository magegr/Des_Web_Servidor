<?php
class DatabaseConnection {//se crea 1 sola vez y se usa esa
    private  static $instancia = null;//siempre static
    private $conn;//

    //permite que nadie pueda acceder al construct / crea y configura
    private function __construct($host, $user, $password, $dbname) { //siempre privado
        try {//solo cuando haya algo que se pueda romper
            $this->connection = new mysqli($host, $user, $password, $dbname);
        }catch (mysqli_sql_exception $e){
            die("Error de conexión: " . $e->getMessage().$e->getLine());
        }
    }
    //si ya hay una instancia nada y de no ser asi llama al constructor de arriba
    public static function getInstance($host, $user, $password, $dbname) { //siempre estatica
        if (self::$instancia === null) {
            self::$instancia = new DatabaseConnection($host, $user, $password, $dbname);
        }
        return self::$instancia;
    }
    // Método para acceder a la conexión
    public function getConexion() {
        return $this->conn;
    }
    public function __destruct() {
        // Cerramos la conexión con la base de datos
        $this->conn->close();
    }
}