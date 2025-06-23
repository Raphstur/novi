<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temoin extends Model
{
    protected $table = 'Temoin';

    protected $fillable = [
        'nom_complet',
        'contact',
        'relation_victime',
        'id_victime', // Gardé au cas où vous l'utiliseriez plus tard
    ];

    // Si vous ne voulez pas de timestamps
    public $timestamps = false;

    public function victime()
    {
        return $this->belongsTo(Victime::class, 'id_victime');
    }
}