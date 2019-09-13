<?php

namespace App\Http\Middleware;

use Closure;

class Operator
{
    public function handle($request, Closure $next)
    {
        if (session()->has('user')) {
            if (session()->get('user')->role->name == 'operator') {
                return $next($request);
            }
        }
        return abort(403);
    }
}
