<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('Suivi', function (Blueprint $table) {
            $table->increments('id'); // int(11) auto_increment
            $table->integer('signalement_id'); // int(11)
            $table->string('code_suivi', 32)->unique();
            $table->string('statut', 50);
            $table->timestamp('date_suivi')->useCurrent();
            $table->text('commentaire')->nullable();
            $table->timestamps();

            $table->foreign('signalement_id')->references('id')->on('Signalement')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('Suivi');
    }
};
