<?php

namespace App\Http\Controllers;

use App\PATRON\DAO\Product\productsDAO;
use App\PATRON\DTO\Product\productsDTO;

class HomeController extends Controller
{
    // Funcion para mostrar todos los productos
    public function showAllProducts()
    {
        // Objeto DAO
        $productDao = new productsDAO();
        // Funcion para mostrar todos los productos
        $Allproducts = $productDao->showProducts();

        $products = []; // Objeto DTO
        // Recorrer todos los productos
        foreach ($Allproducts as $product) {
            // Agregar al objeto DTO los campos obtenidos
            $products[] = new productsDTO(
                $product->id,
                $product->name, 
                $product->description, 
                $product->stock, 
                $product->estado, 
                $product->unitPrice, 
                $product->productImage,
                null
            );
        }
        // Retornar a la visat con los datos obtenidos
        return view('home.home', compact('products','Allproducts'));
    }
}
