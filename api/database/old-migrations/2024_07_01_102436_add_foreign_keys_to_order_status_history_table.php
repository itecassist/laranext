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
        Schema::table('order_status_history', function (Blueprint $table) {
            $table->foreign(['order_id'], 'order_status_history_FK_1')->references(['id'])->on('customer_order')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['order_status_id'], 'order_status_history_FK_2')->references(['id'])->on('order_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_status_history', function (Blueprint $table) {
            $table->dropForeign('order_status_history_FK_1');
            $table->dropForeign('order_status_history_FK_2');
        });
    }
};
