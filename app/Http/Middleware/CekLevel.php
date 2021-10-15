<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    public function handle($request, Closure $next, ...$levels)
    {
        // code
        if (in_array($request->user()->level, $levels)) {
            return $next($request);
        }
        //code end
        return $next($request);
    }
}
