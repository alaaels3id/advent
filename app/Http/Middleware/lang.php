<?php

namespace App\Http\Middleware;

use Closure;
use App;

class lang
{
    public function handle($request, Closure $next)
    {
        App::setlocale(app('lang'));
        return $next($request);
    }
}
