<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'cost' => $request->cost,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'activated' => $request->activated,
        ]);

        return "Produto criado";
    }

    public function show($id)
    {
        return view('products.show', ['product' => Product::findOrFail($id)]);
    }
}
