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
        Schema::create('order_status_history', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order_id')->default(0)->index('order_id');
            $table->integer('order_status_id')->default(0)->index('order_status_history_FI_2');
            $table->dateTime('date_added')->default('0000-00-00 00:00:00');
            $table->string('modified_by', 32)->default('');
            $table->integer('customer_notified')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status_history');
    }
};
