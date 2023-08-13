<?php

namespace App\Connection;

interface DataBaseConnectionFactory 
{
    // Interface que se utilizara para crear la coneccion respectiva segun el modelo
    public function createConnection(): DatabaseConnection;
}