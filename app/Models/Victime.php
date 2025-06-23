<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Victime extends Model
{
    protected $table = 'Victime';

    protected $fillable = [
        'anonyme',
        'age',
        'genre',
        'telephone',
    ];

    public $timestamps = false;

    public function temoin()
    {
        return $this->hasOne(\App\Models\Temoin::class, 'id_victime');
    }
}