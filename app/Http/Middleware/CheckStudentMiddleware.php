<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStudentMiddleware
{ 
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('level') !== 0) {
            abort(404);
        }
        return $next($request);
    }
}
