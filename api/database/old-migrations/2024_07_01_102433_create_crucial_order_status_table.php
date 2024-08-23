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
        Schema::create('crucial_order_status', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('crucial_id');
            $table->integer('order_status_id')->index('crucial_order_status_FI_1');

            $table->unique(['crucial_id', 'order_status_id'], 'crucial_order_status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crucial_order_status');
    }
};
