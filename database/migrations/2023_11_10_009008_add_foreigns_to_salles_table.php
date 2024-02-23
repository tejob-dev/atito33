<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToSallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salles', function (Blueprint $table) {
            $table
                ->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('ville_id')
                ->references('id')
                ->on('villes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('quartier_id')
                ->references('id')
                ->on('quartiers')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salles', function (Blueprint $table) {
            $table->dropForeign(['commune_id']);
            $table->dropForeign(['ville_id']);
            $table->dropForeign(['quartier_id']);
        });
    }
}
