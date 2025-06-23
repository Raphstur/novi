<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyRoleColumnInUtilisateurTable extends Migration
{
    public function up()
    {
        Schema::table('Utilisateur', function (Blueprint $table) {
            $table->string('role', 50)->change(); // Augmente la longueur de la colonne 'role'
        });
    }

    public function down()
    {
        Schema::table('Utilisateur', function (Blueprint $table) {
            $table->string('role', 20)->change(); // Revenir à la longueur précédente si nécessaire
        });
    }
}
