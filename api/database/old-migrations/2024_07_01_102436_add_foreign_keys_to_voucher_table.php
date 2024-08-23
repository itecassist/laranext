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
        Schema::table('voucher', function (Blueprint $table) {
            $table->foreign(['voucher_blueprint_id'], 'voucher_FK_1')->references(['id'])->on('voucher_blueprint')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['member_id'], 'voucher_FK_2')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['order_id'], 'voucher_FK_3')->references(['id'])->on('customer_order')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voucher', function (Blueprint $table) {
            $table->dropForeign('voucher_FK_1');
            $table->dropForeign('voucher_FK_2');
            $table->dropForeign('voucher_FK_3');
        });
    }
};
