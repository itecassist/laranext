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
        Schema::table('shipment_item', function (Blueprint $table) {
            $table->foreign(['shipment_id'], 'shipment_item_FK_1')->references(['id'])->on('shipment')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['order_lineitem_id'], 'shipment_item_FK_2')->references(['id'])->on('order_lineitem')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipment_item', function (Blueprint $table) {
            $table->dropForeign('shipment_item_FK_1');
            $table->dropForeign('shipment_item_FK_2');
        });
    }
};
