<?php

namespace App\Http\Controllers;

use App\Contracts\BaseRepositoryHomeInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    public function showAllProducts()
    {
        $products = Product::paginate(5);
        return view('home.home', compact('products'));
    }
}
