<?php
require("AP1-6.php");
$conn= new connection();
$conn -> getUsuarios();
$id=$conn-> insertUsuario('Maria', 0);
$conn ->updateUsuario('Maria', 1);
$conn ->deleteUsuario('Maria',$id);