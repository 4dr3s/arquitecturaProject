<?php

namespace App\Http\Controllers;

use App\PATRON\DAO\Bill\BillsDAO;
use App\PATRON\DAO\Product\productsDAO;
use App\PATRON\DTO\Bill\BillsDTO;
use App\Providers\RouteServiceProvider;
use DateTime;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Metodo para ver los productos en el carrito de compras
    public function index()
    {
        // Obtener los datos almacenados en la session de cada cliente
        $cartItems = session()->get('cart', []);
        // Devolver los datos obtenidos a la vista
        return view('cart.cart', compact('cartItems'));
    }
    // Funcion para agregar un producto al carrito
    public function addToCar($id)
    {
        // Objeto DAO
        $productDAO = new productsDAO();
        // Acceder al metodo respectivo del objeto para buscar el producto
        $product = $productDAO->showProduct($id);
        // Generar una variable que almacena los datos de la sesion
        $cart = session()->get('cart');
        // Generar un array con el id del producto y guardar los datos del mismo
        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->unitPrice,
            'description' => $product->description,
            'file' => $product->productImage,
            'cantidad' => 1
        ];
        // Añadir el array a la sesion del cliente
        session()->put('cart', $cart);
        // Regreso a la pagina con mensaje de confirmacion
        return redirect()->back()->with('success', 'El producto se agrego al carrito');
    }
    // Metodo para eliminar un producto del carrito
    public function removeFromCar($id)
    {
        // Generar una variable que almacena los datos de la sesion
        $cart = session()->get('cart');
        // Validar que el objeto exista en la sesion
        if (isset($cart[$id])) {
            // Eliminar ese dato de la session
            unset($cart[$id]);
            // Actualizar los datos de la sesion
            session()->put('cart', $cart);
            // Mensaje de exito del procedimiento
            return redirect()->back()->with('success', 'El producto se elimino del carrito');
        }
        // Error en el caso de que no se pueda encontrar el producto en la session
        return redirect()->back()->with('error', 'El producto no se pudo encontrar en el carrito');
    }
    // Funcion para comprar los productos
    public function buyItems()
    {
        $totalPrice = 0;
        // Recorrer los datos de la session del usuario
        foreach (session()->get('cart') as $productid => $product) {
            // Instanciar una variable con el precio de cada producto y sumarlo para generar el valor total
            $totalPrice = $product['price'] + $totalPrice;
        }
        // Retornar a la vista con las datos obtenidos
        return view('cart.buyItems', compact('totalPrice'));
    }
    // Funcion para incrementar la cantidad de un producto
    public function increment($id)
    {
        // Objeto DAO
        $productDAO = new productsDAO();
        // Acceder al metodo respectivo del objeto para buscar el producto
        $productItem = $productDAO->showProduct($id);
        // Recorrer los elementos de la session
        foreach (session()->get('cart') as $productid => $product) {
            // Validar que se encontro el producto buscado en la session
            if ($product['id'] === $productItem->id) {
                // Aumentar la cantidad del producto
                $product['cantidad']++;
                // Generar una variable que almacena los datos de la sesion
                $cart = session()->get('cart');
                // Añadir la variable de la sesion del cliente
                session()->put('cart', $cart);
                // Actualizar el precio del producto en base al incremento de la cantidad de los productos
                $product['price'] = $product['price'] + $productItem->unitPrice;
                // Validar para que la cantidad de productos no supere los 5 productos
                if ($product['price'] != $productItem->unitPrice * 6) {
                    // Es necesario eliminar ese producto de la sesion para ser actualizado desde 0 con los nuevos valores
                    if (isset($cart[$id])) {
                        unset($cart[$id]);
                    }
                    // Generar un array con el id del producto y guardar los datos del mismo
                    $cart[$id] = [
                        'id' => $productItem->id,
                        'name' => $productItem->name,
                        'price' => $product['price'],
                        'description' => $productItem->description,
                        'file' => $productItem->productImage,
                        'cantidad' => $product['cantidad']++,
                    ]; 
                    // Añadir la variable de la sesion del cliente
                    session()->put('cart', $cart);
                    // Redireccionar a la vista anterior
                    return redirect()->back();
                } else {
                    // Si se intenta aumentar mas la cantidad se devuelve el siguiente mensaje de error
                    return redirect()->back()->with('success', 'No se puede aumentar más la cantidad');
                }
            }
        }
    }
    // Funcion para disminuir la cantidad de un producto
    public function dicrement($id)
    {
        // Objeto DAO
        $productDAO = new productsDAO();
        // Acceder al metodo respectivo del objeto para buscar el producto
        $productItem = $productDAO->showProduct($id);
        // Recorrer los elementos de la session
        foreach (session()->get('cart') as $productid => $product) {
            // Validar que se encontro el producto buscado en la session
            if ($product['id'] === $productItem->id) {
                // Diminuir la cantidad del producto
                $product['cantidad']--;
                // Guardar los datos de la session en una variable
                $cart = session()->get('cart');
                // Actualizar los datos de la sesion
                session()->put('cart', $cart);
                // Disminuir el precio del producto
                $product['price'] = $product['price'] - $productItem->unitPrice;
                // Validar que el precio no sea negativo
                if ($product['price'] != 0) {
                    // Es necesario eliminar ese producto de la sesion para ser actualizado desde 0 con los nuevos valores
                    if (isset($cart[$id])) {
                        unset($cart[$id]);
                    }
                    // Generar un array con el id del producto y guardar los datos del mismo
                    $cart[$id] = [
                        'id' => $productItem->id,
                        'name' => $productItem->name,
                        'price' => $product['price'],
                        'description' => $productItem->description,
                        'file' => $productItem->productImage,
                        'cantidad' => $product['cantidad']--,
                    ];
                    // Añadir la variable de la sesion del cliente
                    session()->put('cart', $cart);
                    // Redireccionar a la vista anterior
                    return redirect()->back();
                } else {
                    // Si se intenta disminuir mas la cantidad se devuelve el siguiente mensaje de error
                    return redirect()->back()->with('success', 'No se puede disminuir la cantidad');
                }
            }
        }
    }
    // Funcion para realizar la compra
    public function doSell()
    {
        $cantidad = [];
        $products = [];
        // Recorrer los elementos de la session
        foreach (session()->get('cart') as $productid => $product) {
            // Guardar los datos de la cantidad segun el producto
            $cantidad[] = [
                $product['name'] => $product['cantidad']
            ];
            // Guardar el nombre del producto
            $products[] = [
                'name' => $product['name']
            ];
        };

        $totalPrice = 0;
        // Recorrer los elementos de la session
        foreach (session()->get('cart') as $productid => $product) {
            // Guardar el precio total (importe)
            $totalPrice = $product['price'] + $totalPrice;
        }
        // Objeto DTO
        $billDTO = new BillsDTO(
            $id = null,
            $cantidad,
            $totalPrice,
            (new DateTime(now()->toDateTimeString()))->format('Y-m-d\TH:i:s'),
            Auth::user()->id,
            $products
        );
        // Objeto DAO
        $billDao = new BillsDAO();
        // Acceder a la funcion para crear la factura
        $billDao->createBill($billDTO);
        // Eliminar los datos de la session para borrar los productos comprados
        session()->invalidate();
        // Redireccion a la primera ruta en web.php
        return redirect(RouteServiceProvider::HOME);
    }
}
