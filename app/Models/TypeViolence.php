<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeViolence extends Model
{
    protected $table = 'TypeViolence';

    protected $fillable = [
        'nom',
        'sous_categorie',
    ];

    public $timestamps = false;
}