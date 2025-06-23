<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérification spéciale pour l'admin
        if ($request->email === 'adminben@gmail.com') {
            if ($request->password !== 'benadmin123') {
                return back()->withErrors([
                    'email' => 'Identifiants administrateur incorrects.'
                ]);
            }

            $user = Utilisateur::firstOrCreate(
                ['email' => 'adminben@gmail.com'],
                [
                    'name' => 'Admin Ben',
                    'password' => bcrypt('benadmin123'),
                    'role' => 'admin',
                ]
            );
            Auth::login($user);
            return redirect()->route('serv');
        }

        // Connexion normale pour les autres utilisateurs
        $remember = $request->has('remember');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            // Redirection selon le rôle
            return match(Auth::user()->role) {
                'admin' => redirect()->route('serv'),
                'partner' => redirect()->route('partner.dashboard'),
                'authority' => redirect()->route('authority.dashboard'),
                default => redirect('/')
            };
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis sont incorrects.'
        ]);
    }

    public function loginPartner(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'partner'], $remember)) {
            return redirect()->route('partner.dashboard');
        }
        return back()->withErrors(['email' => 'Identifiants partenaires incorrects.']);
    }

    public function loginAutorite(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $request->has('remember');
        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'autorite'], $remember)) {
            return redirect()->route('authority.dashboard');
        }
        return back()->withErrors(['email' => 'Identifiants autorité incorrects.']);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}