<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class CounterPlus extends Component
{

    public $price;
    public $count;

    public function increment($id){
        $productItem = Product::findOrFail($id);
        foreach (session()->get('cart') as $productid => $product) {
            if ($product['id'] === $productItem->id) {
                $product['cantidad']++;
                $cart = session()->get('cart');
                session()->put('cart', $cart);
                $product['price'] = $product['price'] + $productItem->unitPrice;
                if ($product['price'] != $productItem->unitPrice * 5) {
                    if (isset($cart[$id])) {
                        unset($cart[$id]);
                    }
                    $cart[$id] = [
                        'id' => $productItem->id,
                        'name' => $productItem->name,
                        'price' => $product['price'],
                        'description' => $productItem->description,
                        'file' => $productItem->productImage,
                        'cantidad' => $product['cantidad']++,
                    ]; 
                    session()->put('cart', $cart);
                    $price = $product['price'];
                    $count = $product['cantidad'];
                    // return redirect()->back();
                } else {
                    return redirect()->back()->with('success', 'No se puede aumentar más la cantidad');
                }
            }
        }
    }

    public function dicrement($id){
        $productItem = Product::findOrFail($id);
        foreach (session()->get('cart') as $productid => $product) {
            if ($product['id'] === $productItem->id) {
                $product['cantidad']--;
                $cart = session()->get('cart');
                session()->put('cart', $cart);
                $product['price'] = $product['price'] - $productItem->unitPrice;
                if ($product['price'] != 0) {
                    if (isset($cart[$id])) {
                        unset($cart[$id]);
                    }
                    $cart[$id] = [
                        'id' => $productItem->id,
                        'name' => $productItem->name,
                        'price' => $product['price'],
                        'description' => $productItem->description,
                        'file' => $productItem->productImage,
                        'cantidad' => $product['cantidad']--,
                    ];
                    session()->put('cart', $cart);
                    // return redirect()->back();
                } else {
                    return redirect()->back()->with('success', 'No se puede disminuir la cantidad');
                }
            }
        }  
    }

    public function render()
    {
        return view('livewire.counter-plus');
    }
}
