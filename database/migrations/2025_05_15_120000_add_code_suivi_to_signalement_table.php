<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('Signalement', function (Blueprint $table) {
            $table->string('code_suivi', 32)->unique()->nullable();
        });
    }

    public function down()
    {
        Schema::table('Signalement', function (Blueprint $table) {
            $table->dropColumn('code_suivi');
        });
    }
};
