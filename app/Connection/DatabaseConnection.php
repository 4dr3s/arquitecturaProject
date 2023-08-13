<?php
namespace App\Connection;

interface DatabaseConnection {
    // Interface para crear la funcion para devolver el nombre de la coneccion
    public function getConnectionName(): string;
}