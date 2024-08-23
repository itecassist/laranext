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
        Schema::create('next_order_status', function (Blueprint $table) {
            $table->integer('order_status_id');
            $table->integer('next_order_status_id')->index('next_order_status_FI_2');
            $table->text('opm_errors')->nullable();

            $table->primary(['order_status_id', 'next_order_status_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('next_order_status');
    }
};
