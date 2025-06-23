<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySpecialiteLengthInPartenairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Skip this migration if the table does not exist
        if (!Schema::hasTable('Partenaires')) {
            return;
        }
        Schema::table('Partenaires', function (Blueprint $table) {
            $table->string('specialite', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('Partenaires')) {
            return;
        }
        Schema::table('Partenaires', function (Blueprint $table) {
            $table->string('specialite', 50)->change(); // Assuming the original length was 50
        });
    }
}
