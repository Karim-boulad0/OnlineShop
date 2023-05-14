<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->type == 'admin') {
            return view('/dashboard/index');
        } elseif (auth()->user()->type == 'user') {
            return view('website.categories.index');
        } else {
            return view('auth.login');
        }
    }
}
