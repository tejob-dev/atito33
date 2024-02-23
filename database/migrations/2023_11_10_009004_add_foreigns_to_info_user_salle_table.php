<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToInfoUserSalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_user_salle', function (Blueprint $table) {
            $table
                ->foreign('info_user_id')
                ->references('id')
                ->on('comptes')
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
        Schema::table('info_user_salle', function (Blueprint $table) {
            $table->dropForeign(['info_user_id']);
            $table->dropForeign(['salle_id']);
        });
    }
}
