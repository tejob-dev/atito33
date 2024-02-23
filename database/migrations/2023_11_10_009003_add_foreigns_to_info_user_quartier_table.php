<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToInfoUserQuartierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_user_quartier', function (Blueprint $table) {
            $table
                ->foreign('quartier_id')
                ->references('id')
                ->on('quartiers')
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
        Schema::table('info_user_quartier', function (Blueprint $table) {
            $table->dropForeign(['quartier_id']);
            $table->dropForeign(['info_user_id']);
        });
    }
}
