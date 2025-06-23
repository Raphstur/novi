<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signalement;
use App\Models\Utilisateur;
use App\Models\Partenaires;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerApprovedMail;
use App\Mail\PartnerRejectedMail;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Statistiques générales pour le dashboard principal
        $nbSignalements = \App\Models\Signalement::count();
        $nbPartenaires = \App\Models\Utilisateur::where('role', 'partner')->count();
        $nbDemandes = \App\Models\Utilisateur::where('role', 'pending_partner')->count();
        $nbUtilisateurs = \App\Models\Utilisateur::count();
        return view('serv', compact('nbSignalements', 'nbPartenaires', 'nbDemandes', 'nbUtilisateurs'));
    }

    public function validatePartner($id)
    {
        $user = Utilisateur::findOrFail($id);
        
        // Mettre à jour le statut
        $user->role = 'partner';
        $user->save();

        // Envoyer un email de confirmation
        Mail::to($user->email)->send(new PartnerApprovedMail($user));

        return redirect()->route('bordo')
               ->with('success', 'Partenaire validé avec succès. Un email de confirmation a été envoyé.');
    }

    public function rejectPartner($id)
    {
        $user = Utilisateur::findOrFail($id);
        
        // Envoyer un email de rejet
        Mail::to($user->email)->send(new PartnerRejectedMail($user));

        // Supprimer l'utilisateur et son profil partenaire
        if($user->partner) {
            $user->partner->delete();
        }
        $user->delete();

        return redirect()->route('bordo')
               ->with('success', 'Demande rejetée. Un email a été envoyé au demandeur.');
    }

    public function validateAutorite($id)
    {
        $user = \App\Models\Utilisateur::findOrFail($id);
        $user->role = 'autorite';
        $user->save();
        return redirect()->back()->with('success', 'Autorité approuvée avec succès.');
    }

    public function signalements()
    {
        // Charger tous les signalements avec toutes les relations nécessaires
        $signalements = \App\Models\Signalement::with([
            'victime.temoin',
            'localisation',
            'preuves',
            'suivis',
            'typeViolence'
        ])->orderByDesc('date_creation')->get();
        return view('dashboard.signalements', compact('signalements'));
    }

    public function utilisateurs()
    {
        // Charger toutes les demandes de partenaires (role = pending_partner)
        $demandes = \App\Models\Utilisateur::where('role', 'pending_partner')->with('partenaire')->get();
        return view('dashboard.utilisateurs', compact('demandes'));
    }
}