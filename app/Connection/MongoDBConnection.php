<?php

namespace App\Connection;

class MongoDBConnection implements DatabaseConnection 
{
    // Clase que devuelve un string en el que se especifica el nombre de coneccion
    public function getConnectionName(): string 
    {
        return 'mongodb';
    }
}