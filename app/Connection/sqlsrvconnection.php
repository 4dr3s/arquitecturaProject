<?php

namespace App\Connection;

use App\Connection\DatabaseConnection;

class SqlsrvConnection implements DatabaseConnection 
{
    public function getConnectionName(): string 
    {
        return 'sqlsrv';
    }
}