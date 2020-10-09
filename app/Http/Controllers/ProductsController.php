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

        return "Product created";
    }

    public function show($id)
    {
        return view('products.show', ['product' => Product::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('products.edit', ['product' => Product::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'cost' => $request->cost,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'activated' => $request->activated,
        ]);

        return "Product updated";
    }
}
