<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user();

        if (!$user) {
            logger('RoleMiddleware: Aucun utilisateur authentifié.');
            abort(403, 'Unauthorized action.');
        }

        if ($user->role->name !== $role) {
            logger("RoleMiddleware: Rôle utilisateur incorrect. Rôle attendu: $role, rôle actuel: {$user->role->name}");
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
