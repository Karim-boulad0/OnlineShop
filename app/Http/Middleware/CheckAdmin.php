<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{

    public function handle(Request $request, Closure $next): Response
    {

        if (Auth()->user()->type == 'admin') {
            return $next($request);
        } else {
            Auth::logout();
            return Redirect()->route('login');
        }
    }
}
