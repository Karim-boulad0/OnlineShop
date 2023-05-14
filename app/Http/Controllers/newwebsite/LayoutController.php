<?php

namespace App\Http\Controllers\newwebsite;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductColorSize;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;

class LayoutController extends Controller
{

    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $ColorSize = ProductColorSize::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('descr', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('price', 'LIKE', '%' . $searchTerm . '%')
            ->get();
        if (auth()->user()) {
            $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        } else {
            $cartCount = null;
        }

        $categories = Category::where('parent_id', '>', 0)->orWhere('parent_id', 1)->latest()->take(3)->get();
        $productclorsizes = ProductColorSize::latest()->take(3)->get();
        $products = Product::latest()->take(5)->get();
        return view('newwebsite.index', compact('cartCount', 'products', 'ColorSize', 'categories', 'productclorsizes'));
    }
    public function about()
    {
        if (auth()->user()) {
            $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        } else {
            $cartCount = null;
        }

        return view('newwebsite.about', compact('cartCount'));
    }

    public function categories()
    {
        if (auth()->user()) {
            $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        } else {
            $cartCount = null;
        }

        $categories = Category::with('child')->get();
        return view('newwebsite.categories', compact('categories', 'cartCount'));
    }

    public function products($id)
    {
        if (auth()->user()) {
            $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        } else {
            $cartCount = null;
        }

        $categories = Category::with('child')->get();
        $category = Category::find($id);
        $products = $category->products()->with('colorSizes.color', 'colorSizes.size')->get();
        return view('newwebsite.products', compact('products', 'categories', 'cartCount'));
        // dd($products);
    }

    public function productColorSize($id)
    {
        if (auth()->user()) {
            $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        } else {
            $cartCount = null;
        }

        $productclorsize = ProductColorSize::with('images')->find($id);
        return view('newwebsite.product', compact('productclorsize', 'cartCount'));
    }

    public function addtocart(AddToCartRequest $request)
    {
        if (auth()->user()) {
            $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        } else {
            $cartCount = null;
        }


        $productcolorsize =  ProductColorSize::with('color', 'size')->find($request->color_size_id);
        if (auth()->user()) {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_color_size_id' => $productcolorsize->id,
                'price' => $productcolorsize->price,
                'discount' => $productcolorsize->discount,
                'quantity' => $request->quantity,
            ]);
            return redirect()->route('site.website.carts');
        } else {
            return redirect()->route('logout');
        }
    }

    public function carts()
    {
        if (auth()->user()) {

            $user = User::find(auth()->user()->id);
            $orders = $user->orders;
        } else {
            return redirect()->route('login');
        }

        if (auth()->user()) {
            $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        } else {
            $cartCount = null;
        }

        $cartNotHaveOrder = Cart::with('user', 'productColorSize.color', 'productColorSize.size')
            ->where('user_id', auth()->user()->id)
            ->whereDoesntHave('orders')
            ->get();
        $cartHaveOrder = Cart::with('user', 'productColorSize.color', 'productColorSize.size')
            ->where('user_id', auth()->user()->id)
            ->whereHas('orders')
            ->get();
        return view('newwebsite.carts', compact('cartNotHaveOrder', 'cartHaveOrder', 'cartCount', 'orders'));
    }

    public function contact()
    {
        if (auth()->user()) {
            $cartCount = Cart::whereDoesntHave('orders')->where('user_id', auth()->user()->id)->count();
        } else {
            $cartCount = null;
        }

        return view('newwebsite.contact', compact('cartCount'));
    }

    public function addCart(Request $request)
    {
        dd($request->all());
    }
}
