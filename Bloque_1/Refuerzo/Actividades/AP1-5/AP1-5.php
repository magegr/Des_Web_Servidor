<?php
//Conexión a la base de datos
$host = "mariadb-server";
$username = "root";
$password = "root";
$database = "AP1";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
echo "Conexion exitosa"."<br>";

//Lectura de datos
$sql = "SELECT * FROM usuarios";
$result = $mysqli->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "El usuario " . $row["nombre"] . " posee la id: ". $row["id"] ." y su estado es:" .$row["estado"]."<br>";
}
//Inserción de un nuevo registro

$sql= "INSERT INTO usuarios (nombre,estado) VALUES ('Maria',0)";
try {
    $mysqli->query($sql);
    $id = $mysqli->insert_id;
    echo "El usuario ha sido registrado con ID: $id<br>";
}catch(mysqli_sql_exception $e){
    die("Se ha producido un error en el servidor de base de datos al insertar: ".$e->getMessage());
}
//Actualización del registro insertado

$sql = "UPDATE usuarios SET estado='1' WHERE nombre='Maria' ";
try {
    if ($mysqli->query($sql) === TRUE) {
        echo "Tarea actualizada correctamente";
    } else {
        echo "Error al actualizar " . $mysqli->error;
    }
}catch(mysqli_sql_exception $e){
    die("se ha producido un error en el servidor de base de datos: ".$e->getMessage());
}

//Borrado del registro
$sql = "DELETE FROM usuarios WHERE nombre='Maria'";
try {
    if ($mysqli->query($sql) === TRUE) {
        echo "Se ha realizado correctamente el borrado de la id " . $id . "<br>";
    } else {
        echo "Error al borrar el usuario " . $mysqli->error;
    }
}catch(mysqli_sql_exception $e){
    die("Se ha producido un error en el servidor de base de datos: ".$e->getMessage());
}
//Cierre de la conexión
$mysqli->close();
