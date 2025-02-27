<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsTourist
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated AND has the 'tourist' role
        if (Auth::check() && Auth::user()->role === 'tourist') {
            return $next($request);
        }

        // Redirect with an error message if the user is not a tourist
        return redirect('/')->with('error', 'You do not have access to this page.');
    }
}
