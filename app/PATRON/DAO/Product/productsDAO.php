<?php

namespace App\PATRON\DAO\Product;

use App\Models\Product;
use App\PATRON\DAO\Connection\connection;

class productsDAO extends connection
{
    public function showProducts()
    {
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        $products = Product::on($sqlsrvDBConnection)->paginate(5);

        return $products;
    }

    public function showProduct($id)
    {
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        $products = Product::on($sqlsrvDBConnection)->findOrFail($id);

        return $products;
    }
}