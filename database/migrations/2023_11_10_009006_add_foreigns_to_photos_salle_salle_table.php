<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToPhotosSalleSalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photos_salle_salle', function (Blueprint $table) {
            $table
                ->foreign('photos_salle_id')
                ->references('id')
                ->on('photos_salles')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('salle_id')
                ->references('id')
                ->on('salles')
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
        Schema::table('photos_salle_salle', function (Blueprint $table) {
            $table->dropForeign(['photos_salle_id']);
            $table->dropForeign(['salle_id']);
        });
    }
}
