<?php

namespace App\Http\Controllers;

use App\Models\shop;
use Illuminate\Http\Request;

class GegevensController extends Controller
{
    public function index()
    {
        $test = shop::find(1);
        $info = shop::join('products', 'products.shop_id', '=', 'shops.id')->get();
        return view('gegevens.index', compact('info', 'test'));
    }
}
