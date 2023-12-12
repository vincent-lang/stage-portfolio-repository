<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        return view('gegevens.products', [
            'products' => product::with('shop')->get()
        ]);
    }
}
