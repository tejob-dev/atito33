<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->string('nom_salle');
            $table->string('adresse_salle');
            $table->text('presentation_salle')->nullable();
            $table->integer('capacite_salle');
            $table->string('tarif_salle');
            $table->string('acces_salle')->nullable();
            $table->string('logistique_salle')->nullable();
            $table->string('telephone')->nullable();
            $table->string('tel_whatsapp')->nullable();
            $table->string('email_salle')->nullable();
            $table->string('facebook_salle')->nullable();
            $table->string('site_internet')->nullable();
            $table->string('photo')->nullable();
            $table->dateTime('date_salle');
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->unsignedBigInteger('ville_id')->nullable();
            $table->unsignedBigInteger('quartier_id')->nullable();

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
        Schema::dropIfExists('salles');
    }
}
