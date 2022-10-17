<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLecturerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guest()) {
            abort(404);
        } else if (Auth::user()->level !== 1) {
            abort(404);
        }
        return $next($request);
    }
}
