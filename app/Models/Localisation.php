<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localisation extends Model
{
    protected $table = 'Localisation';

    protected $fillable = [
        'latitude',
        'longitude',
        'adresse',
        'zone_administrative',
    ];

    public $timestamps = false;
}