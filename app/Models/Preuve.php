<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preuve extends Model
{
    protected $table = 'Preuve';

    protected $fillable = [
        'type',
        'chemin_fichier',
        'date_upload',
        'taille_fichier',
        'id_signalement',
    ];

    public $timestamps = false;

    public function signalement()
    {
        return $this->belongsTo(Signalement::class, 'id_signalement');
    }
}