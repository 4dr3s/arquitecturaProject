<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\PATRON\DAO\Product\productsDAO;
use App\PATRON\DTO\Product\productsDTO;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Funcion para buscar producto
    public function searchItem(Request $request)
    {
        // Objeto DAO
        $productDao = new productsDAO();
        // Acceder a la funcion para buscar un producto
        $Allproducts = $productDao->searchItem($request->search);

        $products = []; // Objeto DTO
        foreach ($Allproducts as $product) {
            // Objeto DTO con los datos obtenidos
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
        // Retornar la vista con los datos obtenidos
        return view('home.home', compact('products', 'Allproducts'));
    }
    // Funcion para listarProductos para administrador
    public function listProduct()
    {
        // Objeto DAO
        $productDao = new productsDAO();
        // Acceder a la funcion correspondiente
        $productsList = $productDao->showProductsAdmin();

        $products = [];
        // Recorrer la lista de productos
        foreach ($productsList as $product) {
            // Acceder a la relacion entre tablas productos y categorias
            foreach ($product->Categories as $categories) {
                // Objeto DTO
                $products[] = new productsDTO(
                    $product->id,
                    $product->name,
                    $product->description,
                    $product->stock,
                    $product->estado,
                    $product->unitPrice,
                    $product->productImage,
                    $categories->name
                );
            }
        }
        // Retornar la vista con los datos obtenidos
        return view('admin.product.list', compact('products', 'productsList'));
    }

    public function searchAdminProduct(Request $request)
    {
        // Objeto DAO
        $productDao = new productsDAO();
        // Acceder a la funcion correspondiente de busqueda segun campos como name o mail
        $productsList = $productDao->searchProductsAdmin($request->search);

        $products = [];
        // Recorrer la lista de productos
        foreach ($productsList as $product) {
            foreach ($product->Categories as $categories) {
                $products[] = new productsDTO(
                    $product->id,
                    $product->name,
                    $product->description,
                    $product->stock,
                    $product->estado,
                    $product->unitPrice,
                    $product->productImage,
                    $categories->name
                );
            }
        }
        // Retornar la vista con los datos obtenidos
        return view('admin.product.list', compact('products', 'productsList'));
    }

    public function create()
    {
        return view('product');
    }

    public function store(Request $request)
    {
        // Generar un nombre para el archivo de su imagen especificando la extension del mismo
        $fileName = time() . '.' . $request->productImage->extension();
        // Guardar la imagen con el nombre anterior en la carpeta storage
        $request->productImage->storeAs('public/ProductImages/' . $fileName);
        // Guardar los datos de la peticion en la base de datos
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->unitPrice = $request->unitPrice;
        $product->productImage = $fileName;

        $product->save();
        // Retornar la vista con los datos obtenidos
        return redirect(RouteServiceProvider::HOME);
    }

    public function show($id)
    {
        // Objeto DAO
        $productDao = new productsDAO();
        // Acceder a la funcion correspondiente
        $onlyProd = $productDao->showProduct($id);
        // Objeto DTO con los campos obtenidos
        $product = new productsDTO(
            $onlyProd->id,
            $onlyProd->name,
            $onlyProd->description,
            $onlyProd->stock,
            $onlyProd->estado,
            $onlyProd->unitPrice,
            $onlyProd->productImage,
            null
        );
        // Retornar la vista con los datos obtenidos
        return view('home.product', ['product' => $product]);
    }

    public function modifyProduct($id)
    {
        // Objeto DAO
        $productDAO = new productsDAO();
        // Acceder a la funcion correspondiente
        $productsList = $productDAO->modifyProduct($id);

        $products = [];
        // Recorrer la lista de productos
        foreach ($productsList as $product) {
            // Acceder a la relacion entre tablas productos y categorias
            foreach ($product->Categories as $categories) {
                // Objeto DTO
                $products[] = new productsDTO(
                    $product->id,
                    $product->name,
                    $product->description,
                    $product->stock,
                    $product->estado,
                    $product->unitPrice,
                    $product->productImage,
                    $categories->name
                );
            }
        }
        // Retornar la vista con los datos obtenidos
        return view('admin.product.list', compact('products', 'productsList'));
    }

    public function modifyProductActivate($id)
    {
        // Objeto DAO
        $productDAO = new productsDAO();
        // Acceder a la funcion correspondiente
        $productsList = $productDAO->modifyProductActivate($id);

        $products = [];
        // Recorrer la lista de productos
        foreach ($productsList as $product) {
            // Acceder a la relacion entre tablas productos y categorias
            foreach ($product->Categories as $categories) {
                // Objeto DTO
                $products[] = new productsDTO(
                    $product->id,
                    $product->name,
                    $product->description,
                    $product->stock,
                    $product->estado,
                    $product->unitPrice,
                    $product->productImage,
                    $categories->name
                );
            }
        }
        // Retornar la vista con los datos obtenidos
        return view('admin.product.list', compact('products', 'productsList'));
    }

    public function addProduct($id)
    {
        // Objeto DAO
        $productDAO = new productsDAO();
        // Acceder a la funcion correspondiente
        $productsList = $productDAO->addProduct($id);

        $products = [];
        // Recorrer la lista de productos
        foreach ($productsList as $product) {
            // Acceder a la relacion entre tablas productos y categorias
            foreach ($product->Categories as $categories) {
                // Objeto DTO
                $products[] = new productsDTO(
                    $product->id,
                    $product->name,
                    $product->description,
                    $product->stock,
                    $product->estado,
                    $product->unitPrice,
                    $product->productImage,
                    $categories->name
                );
            }
        }
        // Retornar la vista con los datos obtenidos
        return view('admin.product.list', compact('products', 'productsList'));
    }
}
