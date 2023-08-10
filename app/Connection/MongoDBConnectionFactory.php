<?php

namespace App\Connection;

use App\Connection\DataBaseConnectionFactory;
use App\Connection\MongoDBConnection;

class MongoDBConnectionFactory implements DataBaseConnectionFactory
{
    public function createConnection(): DatabaseConnection
    {
        return new MongoDBConnection();
    }
}