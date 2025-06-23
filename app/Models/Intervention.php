<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $table = 'Intervention';

    protected $fillable = [
        'assignee_a',
        'type_intervention',
        'statut',
        'date_debut',
        'date_fin',
        'date_planifiee',
        'id_signalement',
        'id_utilisateur',
    ];

    public $timestamps = false;

    public function signalement()
    {
        return $this->belongsTo(Signalement::class, 'id_signalement');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }
}