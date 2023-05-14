<?php

namespace App\Http\Controllers\WebSite;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('website.categories.index', compact('categories'));
    }
}
