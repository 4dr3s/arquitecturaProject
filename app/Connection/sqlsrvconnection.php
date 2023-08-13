<?php

namespace App\Connection;

use App\Connection\DatabaseConnection;

class SqlsrvConnection implements DatabaseConnection 
{
    // Clase que devuelve un string en el que se especifica el nombre de coneccion
    public function getConnectionName(): string 
    {
        return 'sqlsrv';
    }
}