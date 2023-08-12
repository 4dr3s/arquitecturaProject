<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\LineChart;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de Login
Route::get('/login', function(){
    return view('auth.components.app');
})->name('login');
Route::post('authenticate', [LoginController::class, 'login'])->name('authenticate');
// Rutas de Register
Route::get('/register', function(){
    return view('auth.components.app');
})->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('registering');

Route::middleware('auth')->group(function(){
    // Home
    Route::get('/home', [HomeController::class, 'showAllProducts']);
    // LogOut
    Route::post('/logout', [LoginController::class, 'logOut']);
    // UserDetail
    Route::get('/showDetail', [UserController::class, 'showUser'])->name('showDetail');
    // Detail Products
    // Route::resource('/product', ProductController::class);
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
    // Carrito de Compras
    Route::get('/cart', [CartController::class, 'index'])->name('CarIndex');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCar'])->name('AddToCar');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCar'])->name('removeFromCar');
    Route::post('/cart/buy',[CartController::class, 'buyItems'])->name('buyItems');
    Route::post('/cart/increment/{id}',[CartController::class, 'increment'])->name('cartIncrement');
    Route::post('/cart/dicrement/{id}',[CartController::class, 'dicrement'])->name('cartDicrement');
    Route::post('/cart/buy/items', [CartController::class, 'doSell'])->name('buyItems');
    // Search Item
    // Route::post('search', [ProductController::class, 'searchItem'])->name('searchProduct');
    Route::get('search', [ProductController::class, 'searchItem'])->name('searchProduct');
    // Listar Producto - Admin
    Route::get('/listproduct',[ProductController::class, 'listProduct'])->name('showProductsAdmin')->middleware('isAdmin');
    // Listar Usuarios - Admin
    Route::get('/listUsers', [UserController::class, 'showUserList'])->name('showUserAdmin')->middleware('isAdmin');
    // Bill
    Route::post('/bill/detail/{id}', [BillController::class, 'showUserBillDetail'])->name('showUserBill')->middleware('isAdmin');
    // Dashboard
    Route::get('/chartView', [DashBoardController::class, 'handleChart']);
});

// Mensaje de confirmacion
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/product', [ProductController::class, 'create']);
Route::post('product', [ProductController::class, 'store']);