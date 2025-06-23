<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    protected $table = 'Organisation';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom',
        'type',
        'telephone',
        'adresse',
        'specialite'
    ];

    public $timestamps = false;

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id');
    }

    public function partenaire()
    {
        return $this->hasOne(Partenaires::class, 'id_organisation');
    }
}