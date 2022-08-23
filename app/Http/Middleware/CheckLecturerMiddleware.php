<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLecturerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('level') !== 1) {
            abort(404);
        }
        return $next($request);
    }
}
