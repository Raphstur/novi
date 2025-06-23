<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors([
                'auth' => 'Veuillez vous connecter pour accéder à cette page'
            ]);
        }

        if (Auth::user()->role !== 'admin') {
            return redirect('/')->withErrors([
                'permission' => 'Accès réservé aux administrateurs'
            ]);
        }

        return $next($request);
    }
}