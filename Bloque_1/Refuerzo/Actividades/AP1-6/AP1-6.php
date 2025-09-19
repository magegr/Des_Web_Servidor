<?php
class connection
{
    //acordarnos de que existe self:: cuando le ponemos constante
    private const host = "mariadb-server";
    private const database = "AP1";
    private const username  = "root";
    private const password  = "root";
    private $conn;

    // Constructor: abre conexión
    public function __construct() { //cuando llamas al new realmente estas llamando al construct
        // Se crea la conexión a la base de datos
        $this->conn = new mysqli(self::host, self::username, self::password, self::database);
        // Verificamos si hubo un error en la conexión
        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
        echo "Conexión exitosa<br>";
    }

    // Método para leer todos los usuarios
    public function getUsuarios() {
        $sql = "SELECT * FROM usuarios"; // Consulta SQL
        $result = $this->conn->query($sql); // Ejecutamos la consulta

        // Recorremos los resultados y mostramos la información
        while ($row = $result->fetch_assoc()) {
            echo "El usuario " . $row["nombre"] . " posee la id: " . $row["id"] . " y su estado es: " . $row["estado"] . "<br>";
        }
    }
    // Método para insertar un nuevo usuario
    public function insertUsuario($nombre, $estado) {
        // Consulta SQL de inserción
        $sql = "INSERT INTO usuarios (nombre, estado) VALUES ('$nombre', $estado)";
        try {
            // Ejecutamos la consulta
            $this->conn->query($sql);
            // Obtenemos el ID autoincremental del nuevo registro
            $id = $this->conn->insert_id;
            echo "El usuario ha sido registrado con ID: $id<br>";
            return $id; // Devolvemos el id insertado
        } catch (mysqli_sql_exception $e) {
            // Si hay error, detenemos el programa mostrando el mensaje
            die("Se ha producido un error al insertar: " . $e->getMessage());
        }
    }

    // Método para actualizar el estado de un usuario
    public function updateUsuario($nombre, $estado) {
        // Consulta SQL de actualización
        $sql = "UPDATE usuarios SET estado='$estado' WHERE nombre='$nombre'";
        try {
            // Si la consulta se ejecuta correctamente
            if ($this->conn->query($sql) === TRUE) {
                echo "Tarea actualizada correctamente<br>";
            } else {
                echo "Error al actualizar " . $this->conn->error;
            }
        } catch (mysqli_sql_exception $e) {
            die("Error al actualizar: " . $e->getMessage());
        }
    }
    // Método para borrar un usuario
    public function deleteUsuario($nombre , $id){
        // Consulta SQL de borrado (OJO: se borra por nombre, aunque mostramos el id)
        $sql = "DELETE FROM usuarios WHERE nombre='$nombre'";
        try {
            if ($this->conn->query($sql) === TRUE) {
                echo "Se ha realizado correctamente el borrado de la id " . $id . "<br>";
            } else {
                echo "Error al borrar el usuario " . $this->conn->error;
            }
        } catch (mysqli_sql_exception $e) {
            die("Error al borrar: " . $e->getMessage());
        }
    }

    // Destructor: se ejecuta automáticamente cuando el objeto deja de existir
    public function __destruct() {
        // Cerramos la conexión con la base de datos
        $this->conn->close();
    }
}
