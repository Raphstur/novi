<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Victime;
use App\Models\Temoin;
use App\Models\Signalement;
use App\Models\TypeViolence;
use App\Models\Localisation;
use App\Models\Preuve;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SignalementController extends Controller
{
    public function create()
    {
        return view('signalement');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'temoin.nom_complet' => 'required|string|max:255',
            'temoin.contact' => 'required|string|max:20',
            'temoin.relation_victime' => 'required|string|max:255',
            
            'victime.anonyme' => 'required|boolean',
            'victime.age' => 'required|integer|min:0|max:18',
            'victime.genre' => 'required|string|max:50',
            'victime.telephone' => 'nullable|string|max:20',
            
            'signalement.description' => 'required|string',
            'signalement.niveau_urgence' => 'required|in:standard,urgent',
            
            'type_violence.nom' => 'required|string|max:255',
            'type_violence.sous_categorie' => 'nullable|string|max:255',
            
            'localisation.zone_administrative' => 'required|string|max:255',
            
            'preuve.type' => 'required|string',
            'preuve.chemin_fichier' => 'required|array',
            'preuve.chemin_fichier.*' => 'file|max:5120',
        ]);

        return DB::transaction(function () use ($request) {
            // Création de la victime
            $victime = Victime::create([
                'anonyme' => $request->input('victime.anonyme'),
                'age' => $request->input('victime.age'),
                'genre' => $request->input('victime.genre'),
                'telephone' => $request->input('victime.telephone'),
            ]);

            // Création du témoin
            $temoin = Temoin::create([
                'nom_complet' => $request->input('temoin.nom_complet'),
                'contact' => $request->input('temoin.contact'),
                'relation_victime' => $request->input('temoin.relation_victime'),
                'id_victime' => $victime->id,
            ]);

            // Création de la localisation
            $localisation = Localisation::create([
                'latitude' => $request->input('localisation.latitude'),
                'longitude' => $request->input('localisation.longitude'),
                'adresse' => $request->input('localisation.adresse'),
                'zone_administrative' => $request->input('localisation.zone_administrative'),
            ]);

            // Création du type de violence
            $typeViolence = TypeViolence::create([
                'nom' => $request->input('type_violence.nom'),
                'sous_categorie' => $request->input('type_violence.sous_categorie'),
            ]);

            // Création du signalement avec code de suivi
            $codeSuivi = 'SIG-' . Str::upper(Str::random(8));
            $signalement = Signalement::create([
                'description' => $request->input('signalement.description'),
                'date_creation' => now(),
                'statut' => 'brouillon',
                'est_anonyme' => $request->input('victime.anonyme'),
                'niveau_urgence' => $request->input('signalement.niveau_urgence'),
                'numero_dossier' => 'SIG-' . Str::upper(Str::random(8)),
                'code_suivi' => $codeSuivi,
                'id_victime' => $victime->id,
                'id_localisation' => $localisation->id,
                'id_type_violence' => $typeViolence->id,
            ]);

            // Création de l'entrée de suivi
            \App\Models\Suivi::create([
                'signalement_id' => $signalement->id,
                'code_suivi' => $codeSuivi,
                'statut' => $signalement->statut,
                'date_suivi' => now(),
                'commentaire' => null,
            ]);

            // Gestion des preuves
            if ($request->hasFile('preuve.chemin_fichier')) {
                foreach ($request->file('preuve.chemin_fichier') as $file) {
                    $path = $file->store('preuves', 'public');
                    
                    Preuve::create([
                        'type' => $request->input('preuve.type'),
                        'chemin_fichier' => $path,
                        'date_upload' => now(),
                        'taille_fichier' => $file->getSize(),
                        'id_signalement' => $signalement->id,
                    ]);
                }
            }

            return redirect()->route('code.suivi', ['code' => $signalement->code_suivi]);
        });
    }

    public function showTrackingCode($code)
    {
        return view('code-suivi', ['code_suivi' => $code]);
    }

    public function showByCode(Request $request)
    {
        $code = trim($request->input('code') ?? $request->route('code'));
        
        if (!$code) {
            return view('suivi');
        }

        $signalement = Signalement::with([
                'victime.temoin',
                'localisation',
                'preuves',
                'suivis',
                'typeViolence'
            ])
            ->where('code_suivi', $code)
            ->first();

        if (!$signalement) {
            return view('suivi')->withErrors(['code' => 'Aucun signalement trouvé avec ce code.']);
        }

        return view('suivi', compact('signalement'));
    }

    public function updateStatut(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:brouillon,en cours,cloturé',
        ]);
        $signalement = \App\Models\Signalement::findOrFail($id);
        $signalement->statut = $request->statut;
        $signalement->save();
        return back()->with('success', 'Statut du signalement mis à jour.');
    }

    /**
     * Transmettre un signalement à un partenaire ou une autorité
     */
    public function transmettre(Request $request, $id)
    {
        $signalement = Signalement::findOrFail($id);
        $type = $request->input('destinataire_type');
        if ($type === 'partenaire') {
            $partenaireId = $request->input('partenaire_id');
            if ($partenaireId) {
                // S'assurer que c'est bien l'id du compte utilisateur du partenaire
                $utilisateur = \App\Models\Utilisateur::find($partenaireId);
                if ($utilisateur && $utilisateur->role === 'partner') {
                    \App\Models\Intervention::create([
                        'assignee_a' => 'partenaire',
                        'type_intervention' => 'SIG', // Correction: valeur très courte pour éviter le warning SQL
                        'statut' => 'nouveau',
                        'date_debut' => now(),
                        'date_planifiee' => now(), // Correction: champ obligatoire
                        'id_signalement' => $signalement->id,
                        'id_utilisateur' => $utilisateur->id,
                    ]);
                    return back()->with('success', 'Signalement transmis au partenaire avec succès.');
                } else {
                    return back()->with('error', 'Le partenaire sélectionné est invalide.');
                }
            }
        } elseif ($type === 'autorite') {
            $autoriteId = $request->input('autorite_id');
            if ($autoriteId) {
                // S'assurer que c'est bien l'id du compte utilisateur de l'autorité
                $utilisateur = \App\Models\Utilisateur::find($autoriteId);
                if ($utilisateur && $utilisateur->role === 'autorite') {
                    \App\Models\Intervention::create([
                        'assignee_a' => 'autorite',
                        'type_intervention' => 'SIG', // Correction: valeur très courte pour éviter le warning SQL
                        'statut' => 'nouveau',
                        'date_debut' => now(),
                        'date_planifiee' => now(), // Correction: champ obligatoire
                        'id_signalement' => $signalement->id,
                        'id_utilisateur' => $utilisateur->id,
                    ]);
                    return back()->with('success', 'Signalement transmis à l\'autorité avec succès.');
                } else {
                    return back()->with('error', 'L\'autorité sélectionnée est invalide.');
                }
            }
        }
        return back()->with('error', 'Veuillez sélectionner un destinataire.');
    }

    public function destroy($id)
    {
        $signalement = \App\Models\Signalement::findOrFail($id);
        // Supprimer d'abord les preuves liées pour éviter l'erreur de contrainte
        $signalement->preuves()->delete();
        $signalement->delete();
        return back()->with('success', 'Signalement supprimé avec succès.');
    }
}