<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateRedirect
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // Check if the current route is not the login or registration page
            if ($request->routeIs('login') || $request->routeIs('register') || $request->routeIs('password.request') || $request->routeIs('password.reset')) {
                // Allow access to the login, registration, password reset, and password reset form pages
                return $next($request);
            }

            // Redirect to the login page
            return redirect()->route('login');
        }

        // User is authenticated, continue with the request
        return $next($request);
    }
}
