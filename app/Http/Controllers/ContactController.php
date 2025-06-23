<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactImages = [
            asset('images/images1.jpeg'), 
            asset('images/images2.jpeg')  
        ];
    
        $faqs = [
            [
                'question' => "Comment signaler un cas de violence ?",
                'answer' => "Vous pouvez signaler un cas via notre plateforme en ligne, par téléphone ou en contactant directement les services sociaux."
            ],
            [
                'question' => "Les signalements sont-ils anonymes ?",
                'answer' => "Oui, vous pouvez choisir de faire un signalement de manière anonyme si vous le souhaitez."
            ],
            [
                'question' => "Que se passe-t-il après un signalement ?",
                'answer' => "Une équipe de professionnels évalue la situation et prend les mesures nécessaires pour assurer la sécurité de l'enfant."
            ],
            [
                'question' => "Puis-je suivre l'évolution d'un signalement ?",
                'answer' => "Oui, un numéro de suivi vous sera communiqué pour vous permettre de suivre l'évolution de votre signalement."
            ],
        ];

        return view('contact', compact('contactImages', 'faqs'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'sujet' => 'required',
            'message' => 'required',
            'urgence' => 'required|in:non,faible,moyen,eleve',
            'gdpr' => 'accepted'
        ]);

        // Traitement du formulaire ici...
        
        return back()->with('success', 'Message envoyé! Nous vous répondrons rapidement.');
    }
}