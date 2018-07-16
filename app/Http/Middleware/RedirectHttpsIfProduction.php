<?php

namespace App\Http\Middleware;

use Closure;

class RedirectHttpsIfProduction
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
        if ($request->secure()) {
            return $next($request);
        }

        if (env('APP_ENV') !== 'production') {
            return $next($request);
        }

        return redirect()->secure($request->getRequestUri());
    }
}
