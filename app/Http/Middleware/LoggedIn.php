<?php

namespace App\Http\Middleware;

use Closure;

class LoggedIn
{
    public function handle($request, Closure $next)
    {
        if (session()->has('user'))
        {
            return $next($request);
        }
        return abort(403);
    }
}
