<?php

namespace App\Http\Controllers;

use App\Contracts\BaseRepositoryHomeInterface;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showAllProducts()
    {
        $products = Product::get();
        return view('home.home', compact('products'));
    }
}
