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
        Schema::table('order_lineitem', function (Blueprint $table) {
            $table->foreign(['order_id'], 'order_lineitem_FK_1')->references(['id'])->on('customer_order')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['ticket_id'], 'order_lineitem_FK_10')->references(['id'])->on('ticket')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['virtual_record_id'], 'order_lineitem_FK_11')->references(['id'])->on('virtual_record')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['original_order_lineitem_id'], 'order_lineitem_FK_12')->references(['id'])->on('order_lineitem')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'order_lineitem_FK_2')->references(['id'])->on('product')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['variation_id'], 'order_lineitem_FK_3')->references(['id'])->on('variation')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['shipment_id'], 'order_lineitem_FK_5')->references(['id'])->on('shipment')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['voucher_id'], 'order_lineitem_FK_6')->references(['id'])->on('voucher')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['subscription_id'], 'order_lineitem_FK_8')->references(['id'])->on('subscription')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['member_id'], 'order_lineitem_FK_9')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_lineitem', function (Blueprint $table) {
            $table->dropForeign('order_lineitem_FK_1');
            $table->dropForeign('order_lineitem_FK_10');
            $table->dropForeign('order_lineitem_FK_11');
            $table->dropForeign('order_lineitem_FK_12');
            $table->dropForeign('order_lineitem_FK_2');
            $table->dropForeign('order_lineitem_FK_3');
            $table->dropForeign('order_lineitem_FK_5');
            $table->dropForeign('order_lineitem_FK_6');
            $table->dropForeign('order_lineitem_FK_8');
            $table->dropForeign('order_lineitem_FK_9');
        });
    }
};
