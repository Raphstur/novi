<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerStatusMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'pending_partner') {
            Auth::logout();
            return redirect()->route('login')
                   ->with('error', 'Votre compte est en attente de validation par un administrateur.');
        }

        if (Auth::check() && Auth::user()->role === 'rejected_partner') {
            Auth::logout();
            return redirect()->route('login')
                   ->with('error', 'Votre demande de compte partenaire a été rejetée. Accès non autorisé.');
        }

        return $next($request);
    }
}
