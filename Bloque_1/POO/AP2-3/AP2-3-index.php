<?php
require_once ('AP2-3.php');

$host = "mariadb-server";
$user = "root";
$password = "root";
$dbname = "AP1";

$db1 = DatabaseConnection::getInstance($host, $user, $password, $dbname);
$db2 = DatabaseConnection::getInstance($host, $user, $password, $dbname);

var_dump($db1 === $db2);