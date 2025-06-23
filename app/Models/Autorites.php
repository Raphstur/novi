<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autorites extends Model
{
    protected $table = 'Autorites';

    protected $fillable = [
        'nom',
        'type',
        'contact_urgence',
    ];

    public $timestamps = false;
}