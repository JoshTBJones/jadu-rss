<?php

namespace App\Http\Middleware;

use Closure;

class CheckSession
{
    /**********************************************************************//**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('authenticated') || $request->session()->get('authenticated') === false) {
            return redirect('/login');
        }

        return $next($request);
    }
}
