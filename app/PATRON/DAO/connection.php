<?php

namespace App\PATRON\DAO;

use App\Connection\MySQLSRVConnectionFactory;
use App\Connection\MongoDBConnectionFactory as ConnectionMongoDBConnectionFactory;

class connection
{
    public function sqlsrvConnection(): string
    {
        $sqlsrvDBFactory = new MySQLSRVConnectionFactory();
        $sqlsrvDBConnection = $sqlsrvDBFactory->createConnection()->getConnectionName();

        return $sqlsrvDBConnection;
    }

    public function mongodbConnection(): string
    {
        $mongoDBFactory = new ConnectionMongoDBConnectionFactory();
        $mongoDBConnection = $mongoDBFactory->createConnection()->getConnectionName();

        return $mongoDBConnection;
    }
}