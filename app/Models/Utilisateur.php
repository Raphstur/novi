<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Authenticatable
{
    use Notifiable;

    protected $table = 'Utilisateur';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe_chiffre',
        'role',
        'date_inscription'
    ];

    protected $hidden = [
        'mot_de_passe_chiffre',
        'remember_token',
    ];

    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->mot_de_passe_chiffre;
    }

    public function partenaire()
    {
        return $this->hasOne(Partenaires::class, 'id_organisation');
    }

    public function organisation()
    {
        return $this->hasOne(Organisation::class, 'id');
    }
}