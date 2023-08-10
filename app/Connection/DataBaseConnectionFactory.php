<?php

namespace App\Connection;

interface DataBaseConnectionFactory 
{
    public function createConnection(): DatabaseConnection;
}