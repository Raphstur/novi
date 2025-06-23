<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignalementTypeViolence extends Model
{
    protected $table = 'SignalementTypeViolence';

    protected $fillable = [
        'id_signalement',
        'id_type_violence',
    ];

    public $timestamps = false;

    public function signalement()
    {
        return $this->belongsTo(Signalement::class, 'id_signalement');
    }

    public function typeViolence()
    {
        return $this->belongsTo(TypeViolence::class, 'id_type_violence');
    }
}