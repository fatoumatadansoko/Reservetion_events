<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtilisateurMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->hasRole('user')) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Vous n\'avez pas les permissions nécessaires pour accéder à cette page.');
    }
}
