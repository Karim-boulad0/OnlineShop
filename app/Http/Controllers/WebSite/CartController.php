<?php

namespace App\Http\Controllers\website;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    // public function carts()
    // {
    //     $cartWorder = Cart::with('orders')->get();
    //     // dd($cartWorder);
    //     $carts = Cart::with('user', 'productColorSize.color', 'productColorSize.size')->where('user_id', auth()->user()->id)->get();
    //     return view('website.carts.cart', compact('carts', 'cartWorder'));
    // }
    public function carts()
    {
        $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();

        $cartNotHaveOrder = Cart::with('user', 'productColorSize.color', 'productColorSize.size')
            ->where('user_id', auth()->user()->id)
            ->whereDoesntHave('orders')
            ->get();
        $cartHaveOrder = Cart::with('user', 'productColorSize.color', 'productColorSize.size')
            ->where('user_id', auth()->user()->id)
            ->whereHas('orders')
            ->get();
        return view('website.carts.cart', compact('cartNotHaveOrder', 'cartHaveOrder','cartCount'));
    }

    public function edit($id)
    {
        $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();

        $carts = Cart::find($id)->first();
        return view('website.carts.edit', compact('carts','cartCount'));
    }
    public function update(Request $request)
    {
        $cart = Cart::find($request->cart_id)->update([
            'quantity' => $request->quantity,
        ]);
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        $cart = Cart::find($request->cart_id)->delete();
        return redirect()->back();
    }


    // public function paid(Request $request)
    // {
    //     // return view('website.carts.paid');
    //     dd($request->all());
    // }


    public function confirm(Request $request)
    {
            $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        $users = auth()->user();
        if (count($users->userAddresses) > 0) {
            return view('newwebsite.paid', compact('request','cartCount'));
        } else {
            return redirect()->route('useraddresse.create');
        }
    }
}
