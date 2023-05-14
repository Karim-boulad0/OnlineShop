<?php

use App\Http\Controllers\newwebsite\LayoutController;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\WebSite\ProductController;
use App\Http\Controllers\WebSite\CategoryController;
use App\Http\Controllers\website\UserAddrresController;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
//website
route::get('website/categories', [CategoryController::class, 'index'])->name('website.categories');
route::get('website/product/{id}', [ProductController::class, 'index'])->name('website.product');
route::get('website/ProductColorSize/{id}', [ProductController::class, 'ProductColorSize'])->name('website.ProductColorSize');
route::post('website/addtocart', [ProductController::class, 'addtocart'])->name('website.addtocart');

route::get('website/carts', [CartController::class, 'carts'])->name('website.cart')->middleware('auth');
route::get('website/carts/edit/{id}', [CartController::class, 'edit'])->name('website.cart.edit')->middleware('auth');
route::put('website/carts/update', [CartController::class, 'update'])->name('website.cart.update')->middleware('auth');
route::delete('website/carts/delete', [CartController::class, 'delete'])->name('website.cart.delete')->middleware('auth');
route::put('website/carts/confirm', [CartController::class, 'confirm'])->name('website.cart.confirm')->middleware('auth');
route::get('website/carts/paid', [CartController::class, 'paid'])->name('website.carts.paid')->middleware('auth');

route::resource('website/useraddresse', UserAddrresController::class)->middleware('auth');








// newwebsite


route::get('site/about', [LayoutController::class, 'about'])->name('website/about');
route::get('/', [LayoutController::class, 'index'])->name('website/index');
route::get('site/index', [LayoutController::class, 'index'])->name('website/index');
route::get('site/categories', [LayoutController::class, 'categories'])->name('website/shop/categories');
route::get('site/products/{id}', [LayoutController::class, 'products'])->name('website/shop/products');
route::get('site/productColorSize/{id}', [LayoutController::class, 'productColorSize'])->name('website/shop/productColorSize');
route::post('site/addtocart', [LayoutController::class, 'addtocart'])->name('site.website.addtocart');
route::get('site/addtocart/carts', [LayoutController::class, 'carts'])->name('site.website.carts');
route::get('site/contact', [LayoutController::class, 'contact'])->name('site.contact');
route::post('site/addCart', [LayoutController::class, 'addCart'])->name('site.addCart');




    // $parentCategory = Category::find(1);
    // $childCategories = Category::where('parent_id', $parentCategory->id)
    //     ->with('products')->get();
    // return $childCategories;
    // -----------------------------------------------
