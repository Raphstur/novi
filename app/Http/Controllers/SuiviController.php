<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signalement;
use App\Models\Suivi;

class SuiviController extends Controller
{
    /**
     * Display the tracking page for a specific dossier.
     *
     * @param  string  $code
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $code = $request->input('code');
        
        if ($code) {
            $suivi = Suivi::where('code_suivi', $code)->first();
            if ($suivi) {
                $signalement = $suivi->signalement()->with(['localisation', 'preuves'])->first();
                return view('suivi', compact('signalement'));
            } else {
                return view('suivi')->withErrors(['code' => 'Aucun dossier trouvé pour ce code.']);
            }
        }
        
        return view('suivi');
    }
}