<?php

namespace App\Http\Controllers;

use App\PATRON\DAO\Category\CategoriesDAO;
use App\PATRON\DAO\Product\productsDAO;
use App\PATRON\DAO\User\UserDao;
use App\PATRON\DTO\Category\CategoriesDTO;
use App\PATRON\DTO\Product\productsDTO;
use Illuminate\Http\Request;

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
        // Recorrer la lista de productos
        foreach ($Allproducts as $product) {
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
        $catDAO = new CategoriesDAO();
        $Allcategories = $catDAO->listCategories();
        $categories = []; // Objeto DTO
        foreach ($Allcategories as $category) {
            // Agregar al objeto DTO los campos obtenidos
            $categories[] = new CategoriesDTO(
                $category->id,
                $category->name,
                $category->estado
            );
        }
        // Retornar a la visat con los datos obtenidos
        return view('home.home', compact('products', 'Allproducts', 'categories'));
    }

    public function filter(Request $request)
    {

        if ($request['id'] == null) {
            return $this->showAllProducts();
        } else {
            // Objeto DAO
            $catDAO = new CategoriesDAO();
            // Acceder a la funcion correspondiente
            $cat = $catDAO->findCategory($request['id']);
            foreach ($cat as $cate) {
                $id[] = [
                    'id' => $cate->id
                ];
            }
            // Objeto DAO
            $productDao = new productsDAO();
            // Funcion para mostrar todos los productos
            $Allproducts = $productDao->showProducts();
            $products = []; // Objeto DTO
            // Recorrer la lista de productos
            foreach ($Allproducts as $product) {
                // Acceder a la relacion entre tablas productos y categorias
                foreach ($product->Categories as $cate) {
                    foreach ($id as $item) {
                        if ($item['id'] == $cate->id) {
                            // Objeto DTO
                            $products[] = new productsDTO(
                                $product->id,
                                $product->name,
                                $product->description,
                                $product->stock,
                                $product->estado,
                                $product->unitPrice,
                                $product->productImage,
                                $cate->name
                            );
                        }
                    }
                }
            }
            $Allcategories = $catDAO->listCategories();
            $categories = []; // Objeto DTO
            foreach ($Allcategories as $category) {
                // Agregar al objeto DTO los campos obtenidos
                $categories[] = new CategoriesDTO(
                    $category->id,
                    $category->name,
                    $category->estado
                );
            }

            // Retornar a la visat con los datos obtenidos
            return view('home.home', compact('products', 'Allproducts', 'categories'));
        }
    }
}
