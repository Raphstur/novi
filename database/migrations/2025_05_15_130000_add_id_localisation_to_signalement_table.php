<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('Signalement', function (Blueprint $table) {
            $table->unsignedBigInteger('id_localisation')->nullable()->after('id_victime');
        });
    }

    public function down()
    {
        Schema::table('Signalement', function (Blueprint $table) {
            $table->dropColumn('id_localisation');
        });
    }
};
