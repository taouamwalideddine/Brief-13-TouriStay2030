<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsOwner
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'owner') {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have access to this page.');
    }
}
