<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Skip this migration if the table does not exist
        if (!Schema::hasTable('Partenaires')) {
            return;
        }
        Schema::table('Partenaires', function (Blueprint $table) {
            // No changes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (!Schema::hasTable('Partenaires')) {
            return;
        }
        Schema::table('Partenaires', function (Blueprint $table) {
            // No changes
        });
    }
};
