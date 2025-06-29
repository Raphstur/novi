<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('Utilisateur', function (Blueprint $table) {
            $table->string('nom')->nullable()->change();
        });
    }
    public function down() {
        Schema::table('Utilisateur', function (Blueprint $table) {
            $table->string('nom')->nullable(false)->change();
        });
    }
};
