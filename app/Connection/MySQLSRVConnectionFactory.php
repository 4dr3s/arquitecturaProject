<?php

namespace App\Connection;

use App\Connection\DataBaseConnectionFactory;
use App\Connection\sqlsrvconnection;

class MySQLSRVConnectionFactory implements DataBaseConnectionFactory
{
    // En esta clase se hereda para crear la coneccion respectiva retornando el valor correcto
    public function createConnection():DatabaseConnection
    {
        return new sqlsrvconnection();
    }
}