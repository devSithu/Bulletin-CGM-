<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
class IsAuth
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
        if (Session::has('AUTH')) {
            return $next($request);
        }
        return redirect('login');
    }
}
