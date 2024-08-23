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
        Schema::table('crucial_order_status', function (Blueprint $table) {
            $table->foreign(['order_status_id'], 'crucial_order_status_FK_1')->references(['id'])->on('order_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crucial_order_status', function (Blueprint $table) {
            $table->dropForeign('crucial_order_status_FK_1');
        });
    }
};
