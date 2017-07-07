<?php

namespace App\Http\Middleware;

use Closure;
use Request;

class MedicoMiddleware
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
        if (!$request->session()->has('user')) {
          return redirect()->route('auth/login');
        }

        return $next($request);
    }
}
