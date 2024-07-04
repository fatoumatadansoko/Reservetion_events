<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdminOrAssociation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('association'))) {
            return redirect()->back()->with('error', 'Vous n\'avez pas les permissions nécessaires pour accéder à cette page.');
        }
        return $next($request);
    }
}
