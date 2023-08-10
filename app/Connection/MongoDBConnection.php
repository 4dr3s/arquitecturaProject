<?php

namespace App\Connection;

class MongoDBConnection implements DatabaseConnection 
{
    public function getConnectionName(): string 
    {
        return 'mongodb';
    }
}