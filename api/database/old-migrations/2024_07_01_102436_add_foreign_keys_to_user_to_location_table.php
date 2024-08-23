<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_to_location', function (Blueprint $table) {
            $table->foreign(['user_id'], 'user_to_location_FK_1')->references(['id'])->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['location_id'], 'user_to_location_FK_2')->references(['id'])->on('location')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_to_location', function (Blueprint $table) {
            $table->dropForeign('user_to_location_FK_1');
            $table->dropForeign('user_to_location_FK_2');
        });
    }
};