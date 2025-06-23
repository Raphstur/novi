<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenaires extends Model
{
    protected $table = 'Partenaires';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom_organisation',
        'specialite',
        'zone_couverte',
        'id_organisation'
    ];

    public $timestamps = false;

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_organisation');
    }

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, 'id_organisation');
    }
}