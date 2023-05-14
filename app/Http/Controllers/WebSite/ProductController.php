<?php

namespace App\Http\Controllers\WebSite;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use App\Models\ProductColorSize;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;

class ProductController extends Controller
{
    public function index($id)
    {
        $category = Category::find($id);
        $products = $category->products()->with('colorSizes.color', 'colorSizes.size')->get();
        return view('website.products.productcolorsize', compact('products'));
    }


    public function addtocart(AddToCartRequest $request)
    {
        $productcolorsize =  ProductColorSize::with('color', 'size')->find($request->color_size_id);
        if (auth()->user()) {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_color_size_id' => $productcolorsize->id,
                'price' => $productcolorsize->price,
                'discount' => $productcolorsize->discount,
                'quantity' => $request->quantity,
            ]);
            return redirect()->back();
        } else {
            return redirect()->route('login');
        }
        // dd($request->all());
    }
}
