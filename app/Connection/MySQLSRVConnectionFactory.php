<?php

namespace App\Connection;

use App\Connection\DataBaseConnectionFactory;
use App\Connection\sqlsrvconnection;

class MySQLSRVConnectionFactory implements DataBaseConnectionFactory
{
    public function createConnection():DatabaseConnection
    {
        return new sqlsrvconnection();
    }
}