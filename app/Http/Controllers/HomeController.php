<?php

namespace App\Http\Controllers;

use App\PATRON\DAO\productsDAO;
use App\PATRON\DTO\productsDTO;

class HomeController extends Controller
{
    public function showAllProducts()
    {
        $productDao = new productsDAO();
        $Allproducts = $productDao->showProducts();

        $products = []; // Objeto DTO
        foreach ($Allproducts as $product) {
            $products[] = new productsDTO(
                $product->id,
                $product->name, 
                $product->description, 
                $product->stock, 
                $product->estado, 
                $product->unitPrice, 
                $product->productImage
            );
        }
        return view('home.home', compact('products'));
    }
}
