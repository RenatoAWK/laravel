<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
        ]);

        $data = json_decode($request->items);

        foreach ($data as $item) {

            Item::create([
                'price' => Product::select('price')->where('id', '=', $item)->value('price'),
                'product_id' => $item,
                'order_id' => $order->id,
            ]);
        }

        redirect("/pdf");
    }

    public function show()
    {
        return view("pdf");
    }
}
