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
        Schema::table('next_order_status', function (Blueprint $table) {
            $table->foreign(['order_status_id'], 'next_order_status_FK_1')->references(['id'])->on('order_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['next_order_status_id'], 'next_order_status_FK_2')->references(['id'])->on('order_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('next_order_status', function (Blueprint $table) {
            $table->dropForeign('next_order_status_FK_1');
            $table->dropForeign('next_order_status_FK_2');
        });
    }
};
