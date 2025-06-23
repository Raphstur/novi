<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Signalement extends Model
{
    protected $table = 'Signalement';

    protected $fillable = [
        'description',
        'date_creation',
        'statut',
        'est_anonyme',
        'niveau_urgence',
        'numero_dossier',
        'code_suivi',
        'id_victime',
        'id_localisation',
        'id_type_violence'
    ];

    public $timestamps = false;

    public function victime()
    {
        return $this->belongsTo(Victime::class, 'id_victime');
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class, 'id_localisation');
    }

    public function preuves()
    {
        return $this->hasMany(Preuve::class, 'id_signalement');
    }

    public function suivis()
    {
        return $this->hasMany(Suivi::class, 'signalement_id');
    }

    public function typeViolence()
    {
        return $this->belongsTo(TypeViolence::class, 'id_type_violence');
    }
}