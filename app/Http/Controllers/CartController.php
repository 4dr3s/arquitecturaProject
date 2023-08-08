<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        return view('cart.cart', compact('cartItems'));
    }

    public function addToCar(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if(!$product)
        {
            return redirect()->back()->with('Error','El producto no existe');
        }

        $cart = session()->get('cart');

        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->unitPrice,
            'description' => $product->description,
            'file' => $product->productImage,
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success','El producto se agrego al carrito');
    }

    public function removeFromCar($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);

            session()->put('cart', $cart);
            return redirect()->back()->with('success','El producto se elimino del carrito');
        }

        return redirect()->back()->with('error','El producto no se pudo encontrar en el carrito');
    }

    public function buyItems()
    {
        $totalPrice = 0;
        foreach (session()->get('cart') as $productid => $product) {
            $totalPrice = $product['price'] + $totalPrice;
        }

        return view('cart.buyItems', compact('totalPrice'));
    }
}
