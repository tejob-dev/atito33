<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToSalleTypeSalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salle_type_salle', function (Blueprint $table) {
            $table
                ->foreign('type_salle_id')
                ->references('id')
                ->on('type_salles')
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
        Schema::table('salle_type_salle', function (Blueprint $table) {
            $table->dropForeign(['type_salle_id']);
            $table->dropForeign(['salle_id']);
        });
    }
}
