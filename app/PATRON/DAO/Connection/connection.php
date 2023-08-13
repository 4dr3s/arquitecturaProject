<?php

namespace App\PATRON\DAO\Connection;

use App\Connection\MySQLSRVConnectionFactory;
use App\Connection\MongoDBConnectionFactory as ConnectionMongoDBConnectionFactory;

class connection
{
    // Metodo para establecer la coneccion con sqlserver
    public function sqlsrvConnection(): string
    {
        // Creacion del objeto factory
        $sqlsrvDBFactory = new MySQLSRVConnectionFactory();
        // Acceder al nombre de la coneccion
        $sqlsrvDBConnection = $sqlsrvDBFactory->createConnection()->getConnectionName();
        // Devolver el nombre de la coneccion
        return $sqlsrvDBConnection;
    }
    // Metodo para establecer la coneccion con mongodb
    public function mongodbConnection(): string
    {
        // Creacion del objeto factory
        $mongoDBFactory = new ConnectionMongoDBConnectionFactory();
        // Acceder al nombre de la coneccion
        $mongoDBConnection = $mongoDBFactory->createConnection()->getConnectionName();
        // Devolver el nombre de la coneccion
        return $mongoDBConnection;
    }
}