<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guest()) {
            abort(404);
        } else if (Auth::user()->level !== 2) {
            abort(404);
        }
        return $next($request);
    }
}
