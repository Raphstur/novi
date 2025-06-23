<?php

namespace App\Http\Controllers;

use App\Models\Temoin;
use Illuminate\Http\Request;

class TemoinController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_complet' => 'required|string|max:100',
            'contact' => 'required|string|max:100',
            'relation_victime' => 'required|string|max:100',
        ]);

        try {
            Temoin::create($validatedData);
            
            return redirect()->back()
                ->with('success', 'Informations enregistrées avec succès!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur: '.$e->getMessage());
        }
    }
    public function create()
{
    return view('signalement'); // Le nom de votre vue contenant le formulaire
}
}