<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Récupérer l'utilisateur authentifié
        $user = $request->user();

        // Redirection en fonction du rôle de l'utilisateur

        if ($user->hasRole('admin')) {
            return redirect()->intended(route('dashboard', [], false));
        }
         elseif ($user->hasRole('association')) {
            return redirect()->intended(route('dashboardAssociation', [], false));
        }
         else {
            return redirect()->intended(route('index', [], false));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
