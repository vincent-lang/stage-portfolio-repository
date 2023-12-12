<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shops.index', ['shops' => $shops]);
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'adress' => 'required',
            'country' => 'required'
        ]);

        Shop::create($data);

        return redirect(route('shop.index'));
    }

    public function edit(Shop $shop)
    {
        return view('shops.edit', ['shop' => $shop]);
    }

    public function update(Shop $shop, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'adress' => 'required',
            'country' => 'required'
        ]);

        $shop->update($data);

        return redirect(route('shop.index'))->with('succes', 'Shop Updated Succesfully');
    }

    public function delete(Shop $shop)
    {
        $shop->delete();

        return redirect(route('shop.index'))->with('succes', 'Shop Deleted Succesfully');
    }
}
