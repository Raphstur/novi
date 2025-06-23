<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 use Illuminate\Support\Facades\Hash;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
  

public function up()
{
    DB::table('Utilisateur')->insert([
        'nom' => 'Admin Ben',
        'email' => 'adminben@gmail.com',
        'mot_de_passe_chiffre' => Hash::make('benadmin123'),
        'role' => 'admin',
        'date_inscription' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
};
