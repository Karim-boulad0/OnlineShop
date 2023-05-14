<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductColorSize;

class OrderStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = Cart::with('productColorSize.color', 'productColorSize.size')->find($request->cart_id);
        Order::create([
            'quantity' => $cart->quantity,
            'user_id' => auth()->user()->id,
            'product_color_size_id' => $cart->productColorSize->id,
            'price' => $cart->price,
            'discount' => $cart->discount,
            'Result' => $cart->price * $cart->quantity - $cart->discount * $cart->quantity,
            'cart_id' => $request->cart_id,
        ]);
        $countQuantity = ProductColorSize::find($cart->productColorSize->id)->quantity;
        ProductColorSize::find($cart->productColorSize->id)->update([
            'quantity' =>  $countQuantity - $cart->quantity,
        ]);
        return redirect()->route('site.website.carts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         Order::find($id)->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
