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
/*
$nombre= ' Maria';
$id= 20;
$estado=0;
$sql= "INSERT INTO usuarios (nombre,id,estado) VALUES ('$nombre' ,'$id','$estado')";
if (mysqli_query($mysqli ,$sql)) {
    echo "El usuario ha sido registrado"."<br>";
}else{
    echo "Error: " . mysqli_error($mysqli);
}
*/
//Actualización del registro insertado
/*
$sql = "UPDATE usuarios SET estado='1' WHERE id = '20' ";
if ($mysqli ->query($sql) === TRUE) {
    echo "Tarea actualizada correctamente";
}else {
    echo "Error al actualizar " . $mysqli->error;
}
*/
/*
//Borrado del registro
$sql = "DELETE FROM usuarios WHERE id = '20'";
if ($mysqli->query($sql) === TRUE) {
    echo "Se ha realizado correctamente el borrado de la id " .$id. "<br>";
}else{
    echo "Error al borrar el usuario " . $mysqli->error;
}
*/
//Cierre de la conexión


