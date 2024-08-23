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
        Schema::table('shipment', function (Blueprint $table) {
            $table->foreign(['order_id'], 'shipment_FK_1')->references(['id'])->on('customer_order')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['address_id'], 'shipment_FK_2')->references(['id'])->on('address')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipment', function (Blueprint $table) {
            $table->dropForeign('shipment_FK_1');
            $table->dropForeign('shipment_FK_2');
        });
    }
};
