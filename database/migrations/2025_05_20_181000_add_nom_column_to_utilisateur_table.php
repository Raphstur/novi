<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('Utilisateur', function (Blueprint $table) {
            if (!Schema::hasColumn('Utilisateur', 'nom')) {
                $table->string('nom')->nullable();
            }
        });
    }
    public function down() {
        Schema::table('Utilisateur', function (Blueprint $table) {
            if (Schema::hasColumn('Utilisateur', 'nom')) {
                $table->dropColumn('nom');
            }
        });
    }
};
