<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'Message';

    protected $fillable = [
        'contenu_chiffre',
        'date_envoi',
        'lu',
        'id_expediteur',
        'id_destinataire',
    ];

    public $timestamps = false;

    public function expediteur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_expediteur');
    }

    public function destinataire()
    {
        return $this->belongsTo(Utilisateur::class, 'id_destinataire');
    }
}