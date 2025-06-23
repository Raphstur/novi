<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Partenaires;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.partner_registration');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:Utilisateur,email',
            'mot_de_passe_chiffre' => 'required|string|min:8|confirmed',
            'nom_organisation' => 'required|string|max:100',
            'specialite' => 'required|string|max:30',
            'zone_couverte' => 'required|string|max:50'
        ]);

        DB::beginTransaction();

        try {
            // Création utilisateur
            $utilisateur = Utilisateur::create([
                'nom' => $validatedData['nom'],
                'email' => $validatedData['email'],
                'mot_de_passe_chiffre' => Hash::make($validatedData['mot_de_passe_chiffre']),
                'role' => 'pending_partner',
                'date_inscription' => now()
            ]);

            // Création organisation
            $organisation = Organisation::create([
                'id' => $utilisateur->id,
                'nom' => $validatedData['nom_organisation'],
                'type' => 'Partenaire',
                'specialite' => $validatedData['specialite']
            ]);

            // Création partenaire
            Partenaires::create([
                'nom_organisation' => $validatedData['nom_organisation'],
                'specialite' => $validatedData['specialite'],
                'zone_couverte' => $validatedData['zone_couverte'],
                'id_organisation' => $organisation->id
            ]);

            DB::commit();

            return redirect()->route('login')
                   ->with('status', 'Votre demande a été soumise avec succès. Veuillez patienter pour la validation.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()
                   ->withErrors(['error' => 'Une erreur est survenue lors de l\'inscription: '.$e->getMessage()]);
        }
    }

    public function dashboard()
    {
        $user = auth()->user();
        // Récupérer les signalements transmis à ce partenaire
        $interventions = \App\Models\Intervention::where('id_utilisateur', $user->id)
            ->where('assignee_a', 'partenaire')
            ->with('signalement')
            ->get();
        $signalements = $interventions->pluck('signalement');
        return view('partner.dashboard', compact('signalements'));
    }
}