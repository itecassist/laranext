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
        Schema::table('order_status_description', function (Blueprint $table) {
            $table->foreign(['order_status_id'], 'order_status_description_FK_1')->references(['id'])->on('order_status')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['language_id'], 'order_status_description_FK_2')->references(['id'])->on('language')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_status_description', function (Blueprint $table) {
            $table->dropForeign('order_status_description_FK_1');
            $table->dropForeign('order_status_description_FK_2');
        });
    }
};
