<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RapportIntervention extends Model
{
    protected $table = 'RapportIntervention';

    protected $fillable = [
        'date_redaction',
        'contenu',
        'auteur',
        'format',
        'id_intervention',
    ];

    public $timestamps = false;

    public function intervention()
    {
        return $this->belongsTo(Intervention::class, 'id_intervention');
    }
}