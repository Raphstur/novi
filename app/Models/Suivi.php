<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    protected $table = 'Suivi';

    protected $fillable = [
        'signalement_id',
        'code_suivi',
        'statut',
        'date_suivi',
        'commentaire',
    ];

    // Relation avec Signalement
    public function signalement()
    {
        return $this->belongsTo(Signalement::class, 'signalement_id');
    }
}
