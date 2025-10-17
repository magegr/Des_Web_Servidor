<?php

namespace AP33\models;

use AP33\Core\Database;

//requiere el core

class Tareas //se encarga de coger las cosas de a base de datos
{
    public function findAll()
    {
        $sql = "SELECT * FROM tareas";
        $db = Database::getInstance();
        return $db->executeSQL($sql);
    }
}