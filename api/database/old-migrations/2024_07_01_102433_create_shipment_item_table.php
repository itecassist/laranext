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
        Schema::create('shipment_item', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('shipment_id')->index('shipment_item_FI_1');
            $table->integer('order_lineitem_id')->index('shipment_item_FI_2');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment_item');
    }
};
