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
        Schema::table('customer_order', function (Blueprint $table) {
            $table->foreign(['member_id'], 'customer_order_FK_1')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['order_status_id'], 'customer_order_FK_2')->references(['id'])->on('order_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['original_order_id'], 'customer_order_FK_3')->references(['id'])->on('customer_order')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['currency_id'], 'customer_order_FK_4')->references(['id'])->on('currency')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['site_visit_id'], 'customer_order_FK_5')->references(['id'])->on('site_visit')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['organisation_id'], 'customer_order_FK_6')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['creating_member_id'], 'customer_order_FK_7')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['member_account_id'], 'customer_order_member_account_id')->references(['id'])->on('member_account')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_order', function (Blueprint $table) {
            $table->dropForeign('customer_order_FK_1');
            $table->dropForeign('customer_order_FK_2');
            $table->dropForeign('customer_order_FK_3');
            $table->dropForeign('customer_order_FK_4');
            $table->dropForeign('customer_order_FK_5');
            $table->dropForeign('customer_order_FK_6');
            $table->dropForeign('customer_order_FK_7');
            $table->dropForeign('customer_order_member_account_id');
        });
    }
};
