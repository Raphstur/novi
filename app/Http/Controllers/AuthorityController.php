<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autorites;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthorityController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        // Récupérer les signalements transmis à cette autorité
        $interventions = \App\Models\Intervention::where('id_utilisateur', $user->id)
            ->where('assignee_a', 'autorite')
            ->with('signalement')
            ->get();
        $signalements = $interventions->pluck('signalement');
        return view('authority.dashboard', compact('signalements'));
    }

    public function index()
    {
        $utilisateurs = Utilisateur::all();
        $signalements = \App\Models\Signalement::all();
        $demandes = \App\Models\Utilisateur::where('role', 'pending_partner')->with('partenaire')->get();
        return view('serv', compact('utilisateurs', 'signalements', 'demandes'));
    }

    public function submitReport(Request $request)
    {
        // Logique pour soumettre un rapport
    }

    // Traite l'inscription POST
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateur,email',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Création dans la table Autorites
        $autorite = new Autorites();
        $autorite->nom = $request->name;
        $autorite->contact_urgence = '';
        $autorite->save();

        // Création dans la table Utilisateur
        $utilisateur = new Utilisateur();
        $utilisateur->nom = $request->name;
        $utilisateur->email = $request->email;
        $utilisateur->mot_de_passe_chiffre = Hash::make($request->password);
        $utilisateur->role = 'autorite';
        $utilisateur->date_inscription = now();
        $utilisateur->save();

        return redirect()->route('login')->with('status', 'Inscription autorité réussie. Vous pouvez vous connecter.');
    }
}
