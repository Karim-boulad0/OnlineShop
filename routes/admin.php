<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SizeController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\dashboard\OrderStoreController;
use App\Http\Controllers\Dashboard\ProductColorSizeController;

route::get('/index', [IndexController::class, 'index'])->name('index');
// settings
route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
route::put('/settings/{setting?}/update', [SettingController::class, 'update'])->name('settings.update');
//categories
route::resource('/categories', CategoryController::class)->except('destroy', 'create', 'show');
route::get('dashboard/categories/ajax', [CategoryController::class, 'getall'])->name('dashboard.categories.getall');
route::delete('dashboard/categories/delete', [CategoryController::class, 'delete'])->name('dashboard.categories.delete');
// products
route::resource('/products', ProductController::class);
route::get('dashboard/products/ajax', [ProductController::class, 'datatable'])->name('dashboard.products.getall');
route::delete('dashboard/products/delete', [ProductController::class, 'delete'])->name('dashboard.products.delete');
// colors
route::resource('/colors', ColorController::class);
route::get('dashboard/colors/ajax', [ColorController::class, 'datatable'])->name('dashboard.colors.getall');
route::delete('dashboard/colors/delete', [ColorController::class, 'delete'])->name('dashboard.colors.delete');
// sizes
route::resource('/sizes', SizeController::class);
route::get('dashboard/sizes/ajax', [SizeController::class, 'datatable'])->name('dashboard.sizes.getall');
route::delete('dashboard/sizes/delete', [SizeController::class, 'delete'])->name('dashboard.sizes.delete');
// productcolorsizes
route::resource('/productcolorsizes', ProductColorSizeController::class);
route::get('dashboard/productcolorsizes/ajax', [ProductColorSizeController::class, 'datatable'])->name('dashboard.productcolorsizes.getall');
route::delete('dashboard/productcolorsizes/delete', [ProductColorSizeController::class, 'delete'])->name('dashboard.productcolorsizes.delete');
// users
route::resource('/users', UserController::class);
route::get('dashboard/users/ajax', [UserController::class, 'datatable'])->name('dashboard.users.getall');
route::delete('dashboard/users/delete', [UserController::class, 'delete'])->name('dashboard.users.delete');
route::get('dashboard/users/ajax/user', [UserController::class, 'datatableUser'])->name('dashboard.users.getall.user');
route::get('dashboard/users/user', [UserController::class, 'user'])->name('dashboard.users.user');
//orders
route::get('dashboard/orders', [OrderController::class, 'orders'])->name('orders');
route::get('dashboard/orders/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
route::get('dashboard/orders/datatable', [OrderController::class, 'datatable'])->name('orders.datatable');
route::delete('dashboard/orders/delete', [OrderController::class, 'delete'])->name('orders.delete');
route::put('dashboard/orders/update/{id}', [OrderController::class, 'update'])->name('orderss.update');
route::resource('orderS', OrderStoreController::class)->except('show', 'create', 'index', 'destroy');
