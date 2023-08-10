<?php

namespace App\PATRON\DAO;

use App\Connection\MySQLSRVConnectionFactory;
use App\Models\Product;

class productsDAO extends connection
{
    public function showProducts()
    {
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        $products = Product::on($sqlsrvDBConnection)->get();

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