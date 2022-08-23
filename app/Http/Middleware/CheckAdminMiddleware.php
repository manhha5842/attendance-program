<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('level') !== 2) {
            return redirect()->back();
        }
        return $next($request);
    }
}
