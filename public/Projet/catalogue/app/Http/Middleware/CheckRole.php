<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->check() && Auth::guard('web')->user()->role != 'admin') {
          return back();
        }
        return $next($request);
    }
}
