<?php

namespace App\PATRON\DAO\Category;

use App\Models\Categorie;
use App\PATRON\DAO\Connection\connection;

class CategoriesDAO extends connection
{
    public function listCategories()
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        return $categories = Categorie::on($sqlsrvDBConnection)->get();
    }

    public function findCategory($id)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        return $categories = Categorie::on($sqlsrvDBConnection)->findOrFail($id);
    }
}