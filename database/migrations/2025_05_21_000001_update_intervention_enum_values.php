<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE Intervention MODIFY COLUMN type_intervention ENUM('visite','appel','médicale','juridique','SIG') NOT NULL");
        DB::statement("ALTER TABLE Intervention MODIFY COLUMN statut ENUM('planifiée','en cours','terminée','annulée','nouveau') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE Intervention MODIFY COLUMN type_intervention ENUM('visite','appel','médicale','juridique') NOT NULL");
        DB::statement("ALTER TABLE Intervention MODIFY COLUMN statut ENUM('planifiée','en cours','terminée','annulée') NOT NULL");
    }
};
