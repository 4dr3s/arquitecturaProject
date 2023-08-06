<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function searchItem(Request $request)
    {
        $products = Product::where('name', 'LIKE','%'.$request->search.'%')->get();
        return view('home.home', compact('products'));
    }

    public function listProduct()
    {
        $products = Product::get();
        foreach ($products as $product) {
            if ($product->stock === 0) {
                $prod = Product::findOrFail($product->id);
                $prod->estado = false;
                $prod->save();
            }
        }
        return view('admin.product.list', compact('products'));
    }

    public function create()
    {
        return view('product');
    }

    public function store(Request $request)
    {
        $fileName = time() . '.' . $request->productImage->extension();
        $request->productImage->storeAs('public/productsImages/' . $fileName);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->unitPrice = $request->unitPrice;
        $product->productImage = $fileName;

        $product->save();
        return redirect(RouteServiceProvider::HOME);
    }

    public function show(Product $product)
    {
        return view('home.product', compact('product'));
    }
}
