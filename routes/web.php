<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

// La ruta es la primera en mostrarse ya sea que este logeado o no
Route::get('/', function () {
    return view('welcome');
});

// Rutas de Login
// En esta ruta retornara una vista
Route::get('/login', function(){
    return view('auth.components.app');
})->name('login');
// En esta ruta se ira a un metodo del controlador correspondiente
Route::post('authenticate', [LoginController::class, 'login'])->name('authenticate');
// Rutas de Register
// En esta ruta retornara una vista
Route::get('/register', function(){
    return view('auth.components.app');
})->name('register');
// En esta ruta se ira a un metodo del controlador correspondiente
Route::post('register', [RegisterController::class, 'register'])->name('registering');

// En este grupo de rutas se valida que el usuario que acceda a ellas debe estar autenticado
// La opcion middleware('isAdmin') hace referencia a que solo los que tienen el rol de administradores
// podran acceder a estas rutas
Route::middleware('auth')->group(function(){
    // Home
    // En esta ruta se ira a un metodo del controlador correspondiente
    Route::get('/home', [HomeController::class, 'showAllProducts']);
    // LogOut
    // En esta ruta se ira a un metodo del controlador correspondiente
    Route::post('/logout', [LoginController::class, 'logOut']);
    // UserDetail
    // En esta ruta se ira a un metodo del controlador correspondiente
    Route::get('/showDetail', [UserController::class, 'showUser'])->name('showDetail');
    // Detail Products
    // En esta ruta se ira a un metodo del controlador correspondiente
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
    // Carrito de Compras
    // Las siguientes rutas muestran los diferentes metodos con los que cuenta el controlador
    // para el carrito de compras
    Route::get('/cart', [CartController::class, 'index'])->name('CarIndex');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCar'])->name('AddToCar');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCar'])->name('removeFromCar');
    Route::post('/cart/buy',[CartController::class, 'buyItems'])->name('buyItems');
    Route::post('/cart/increment/{id}',[CartController::class, 'increment'])->name('cartIncrement');
    Route::post('/cart/dicrement/{id}',[CartController::class, 'dicrement'])->name('cartDicrement');
    Route::post('/cart/buy/items', [CartController::class, 'doSell'])->name('buyItems');
    // Productos
    // En este conjunto de rutas se enfoca en el controlador para los productos
    Route::get('/searchProduct', [ProductController::class, 'searchItem'])->name('searchProduct');
    Route::get('/searchProductAdmin', [ProductController::class, 'searchAdminProduct'])->name('searchAdminProduct')->middleware('isAdmin');
    // Listar Producto - Admin
    Route::get('/listproduct',[ProductController::class, 'listProduct'])->name('showProductsAdmin')->middleware('isAdmin');
    Route::get('modifyProduct/{id}', [ProductController::class, 'modifyProduct'])->name('modifyProduct')->middleware('isAdmin');
    Route::get('modifyProductActivate/{id}', [ProductController::class, 'modifyProductActivate'])->name('modifyProductActivate')->middleware('isAdmin');
    Route::get('addProduct/{id}', [ProductController::class, 'addProduct'])->name('addProduct')->middleware('isAdmin');
    // Listar Usuarios - Admin
    // En este conjunto de rutas se enfoca en el controlador para los usuarios
    Route::get('/listUsers', [UserController::class, 'showUserList'])->name('showUserAdmin')->middleware('isAdmin');
    Route::get('modifyUser/{id}', [UserController::class, 'modifyUser'])->name('modifyUser')->middleware('isAdmin');
    Route::get('modifyUserActivate/{id}', [UserController::class, 'modifyUserActivate'])->name('modifyUserActivate')->middleware('isAdmin');
    Route::get('/searchUser', [UserController::class, 'searchUser'])->name('searchUser')->middleware('isAdmin');
    // Bill
    // Rutas para mostrar detalle de las facturas
    Route::post('/bill/detail/{id}', [BillController::class, 'showUserBillDetail'])->name('showUserBill')->middleware('isAdmin');
    // Dashboard
    Route::get('/chartView', [DashBoardController::class, 'handleChart'])->middleware('isAdmin');
});

// Mensaje de confirmacion
// Las siguientes rutas son aquellas necesarias segun la documentacion oficial de Laravel para enviar un
// correo electronico de confirmacion
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/product', [ProductController::class, 'create']);
Route::post('product', [ProductController::class, 'store']);