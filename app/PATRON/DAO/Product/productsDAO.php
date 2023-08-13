<?php

namespace App\PATRON\DAO\Product;

use App\Models\Product;
use App\PATRON\DAO\Connection\connection;

class productsDAO extends connection
{
    // Funcion para mostrar los productos
    public function showProducts()
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $products = Product::on($sqlsrvDBConnection)->where('estado', '=', 1)->paginate(5);
        // Recorrer la lista de productos
        foreach ($products as $product) {
            // Validar si el stock es 0 entonces el estado es false
            if ($product->stock == 0) {
                $product->estado = 0;
                $product->save();
            }
            // Caso contrario el estado es true
            else{
                $product->estado = 1;
                $product->save();
            }
        }
        // retornar la variable para realizar el procedimiento adecuado en el controlador
        return $products;
    }
    // Funcion para mostrar los productos para usarios admin
    public function showProductsAdmin()
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $products = Product::on($sqlsrvDBConnection)->paginate(5);
        // Recorrer la lista de productos
        foreach ($products as $product) {
            // Validar si el stock es 0 entonces el estado es false
            if ($product->stock == 0) {
                $product->estado = 0;
                $product->save();
            }
            // Caso contrario el estado es true
            else{
                $product->estado = 1;
                $product->save();
            }
        }
        // retornar la variable para realizar el procedimiento adecuado en el controlador
        return $products;
    }

    public function searchProductsAdmin($search)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $products = Product::on($sqlsrvDBConnection)->where('name', 'LIKE', '%' . $search . '%')->paginate(5);
        // retornar la variable para realizar el procedimiento adecuado en el controlador
        return $products;
    }

    public function showProduct($id)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $products = Product::on($sqlsrvDBConnection)->findOrFail($id);
        // retornar la variable para realizar el procedimiento adecuado en el controlador
        return $products;
    }

    public function searchItem($search)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // retornar la variable para realizar el procedimiento adecuado en el controlador
        return $products = Product::on($sqlsrvDBConnection)->where('name', 'LIKE', '%' . $search . '%')->where('estado', '=', 1)->paginate(5);
    }
    // Desactivar o colocar a un producto en el estado false
    public function modifyProduct($id)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $product =  Product::on($sqlsrvDBConnection)->findOrFail($id);
        $product['estado'] = 0;
        $product['stock'] = 0;
        $product->save();
        // Realizar la consulta especificando la coneccion y condicionales
        $products = Product::on($sqlsrvDBConnection)->paginate(5);
        // retornar la variable para realizar el procedimiento adecuado en el controlador
        return $products;
    }
    // Desactivar o colocar a un producto en el estado true
    public function modifyProductActivate($id)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $product =  Product::on($sqlsrvDBConnection)->findOrFail($id);
        $product['estado'] = 1;
        $product['stock'] = 1;
        $product->save();
        // Realizar la consulta especificando la coneccion y condicionales
        $products = Product::on($sqlsrvDBConnection)->paginate(5);
        // retornar la variable para realizar el procedimiento adecuado en el controlador
        return $products;
    }
    // Añadir un producto al stock
    public function addProduct($id)
    {
        // Obejto de tipo coneccion
        $connection = new connection();
        $sqlsrvDBConnection = $connection->sqlsrvConnection();
        // Realizar la consulta especificando la coneccion y condicionales
        $product =  Product::on($sqlsrvDBConnection)->findOrFail($id);
        $product['stock'] = $product['stock'] + 1;
        $product['estado'] = 1;
        $product->save();
        // Realizar la consulta especificando la coneccion y condicionales
        $products = Product::on($sqlsrvDBConnection)->paginate(5);
        // retornar la variable para realizar el procedimiento adecuado en el controlador
        return $products;
    }
}