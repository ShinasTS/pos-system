<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class CustomAuth
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
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to login if not authenticated
            return redirect()->route('login');
        }

        return $next($request); // Allow access if authenticated
    }
}
