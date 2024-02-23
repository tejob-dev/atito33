<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_compte');
            $table->string('prenom_compte');
            $table->string('telephone_compte');
            $table->string('whatsapp_compte')->nullable();
            $table->string('adresse_compte')->nullable();
            $table->string('nom_entreprise')->nullable();
            $table->string('siteweb_compte')->nullable();
            $table->string('activite_compte')->nullable();
            $table->string('logo_entreprise')->nullable();
            $table->unsignedBigInteger('user_id');

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
        Schema::dropIfExists('comptes');
    }
}
