<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToInfoUserVilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_user_ville', function (Blueprint $table) {
            $table
                ->foreign('ville_id')
                ->references('id')
                ->on('villes')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('info_user_id')
                ->references('id')
                ->on('comptes')
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
        Schema::table('info_user_ville', function (Blueprint $table) {
            $table->dropForeign(['ville_id']);
            $table->dropForeign(['info_user_id']);
        });
    }
}
