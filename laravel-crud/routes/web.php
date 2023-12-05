<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', [ProductController::class, 'index'])->name('product.index');

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');

Route::delete('/product/{product}/delete', [ProductController::class, 'delete'])->name('product.delete');


Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

Route::get('/shop/create', [ShopController::class, 'create'])->name('shop.create');

Route::post('/shop', [ShopController::class, 'store'])->name('shop.store');

Route::get('/shop/{shop}/edit', [ShopController::class, 'edit'])->name('shop.edit');

Route::put('/shop/{shop}/update', [ShopController::class, 'update'])->name('shop.update');

Route::delete('/shop/{shop}/delete', [ShopController::class, 'delete'])->name('shop.delete');
