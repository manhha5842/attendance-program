<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogoutMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guest()) {
            return redirect()->route('welcome');
        }
        return $next($request);
    }
}
