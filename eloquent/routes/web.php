<?php

use App\Http\Controllers\GegevensController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/gegevens', [GegevensController::class, 'index'])->name('gegevens.index');

Route::get('/products', [ProductController::class, 'products'])->name('products.all');
