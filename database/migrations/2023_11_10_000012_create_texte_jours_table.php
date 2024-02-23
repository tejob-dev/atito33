<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTexteJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('texte_jours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            $table->text('texte');
            $table->string('photo')->nullable();
            $table->string('fonction_texte')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('texte_jours');
    }
}
