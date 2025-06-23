<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeAccesDossier extends Model
{
    protected $table = 'CodeAccesDossier';

    protected $fillable = [
        'code',
        'date_expiration',
        'est_utilise',
        'id_signalement',
    ];

    public $timestamps = false;

    public function signalement()
    {
        return $this->belongsTo(Signalement::class, 'id_signalement');
    }
}