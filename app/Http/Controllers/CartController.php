<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\PATRON\DAO\Bill\BillsDAO;
use App\PATRON\DTO\Bill\BillsDTO;
use App\Providers\RouteServiceProvider;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (!$product) {
            return redirect()->back()->with('Error', 'El producto no existe');
        }

        $cart = session()->get('cart');

        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->unitPrice,
            'description' => $product->description,
            'file' => $product->productImage,
            'cantidad' => 1
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'El producto se agrego al carrito');
    }

    public function removeFromCar($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'El producto se elimino del carrito');
        }

        return redirect()->back()->with('error', 'El producto no se pudo encontrar en el carrito');
    }

    public function buyItems()
    {
        $totalPrice = 0;
        foreach (session()->get('cart') as $productid => $product) {
            $totalPrice = $product['price'] + $totalPrice;
        }

        return view('cart.buyItems', compact('totalPrice'));
    }

    public function increment($id)
    {
        $productItem = Product::findOrFail($id);
        foreach (session()->get('cart') as $productid => $product) {
            if ($product['id'] === $productItem->id) {
                $product['cantidad']++;
                $cart = session()->get('cart');
                session()->put('cart', $cart);
                $product['price'] = $product['price'] + $productItem->unitPrice;
                if ($product['price'] != $productItem->unitPrice * 6) {
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
                    return redirect()->back();
                } else {
                    return redirect()->back()->with('success', 'No se puede aumentar más la cantidad');
                }
            }
        }
    }

    public function dicrement($id)
    {
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
                    return redirect()->back();
                } else {
                    return redirect()->back()->with('success', 'No se puede disminuir la cantidad');
                }
            }
        }
    }

    public function doSell(Request $request)
    {
        $cantidad = [];
        $products = [];
        foreach (session()->get('cart') as $productid => $product) {
            $cantidad[] = [
                $product['name'] => $product['cantidad']
            ];
            $products[] = [
                $product['name']
            ];
        };

        $totalPrice = 0;
        foreach (session()->get('cart') as $productid => $product) {
            $totalPrice = $product['price'] + $totalPrice;
        }

        $billDTO = new BillsDTO(
            $id = null,
            $cantidad,
            $totalPrice,
            (new DateTime(now()->toDateTimeString()))->format('Y-m-d\TH:i:s'),
            Auth::user()->id,
            $products
        );
        $billDao = new BillsDAO();
        $bill = $billDao->createBill($billDTO);

        $items = session()->get('cart');
        session()->invalidate();
        return redirect(RouteServiceProvider::HOME);
    }
}
