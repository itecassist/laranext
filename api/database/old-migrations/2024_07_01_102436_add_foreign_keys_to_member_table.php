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
        Schema::table('member', function (Blueprint $table) {
            $table->foreign(['default_address_id'], 'member_FK_2')->references(['id'])->on('address')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['default_card_id'], 'member_FK_3')->references(['id'])->on('payment_method')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->dropForeign('member_FK_2');
            $table->dropForeign('member_FK_3');
        });
    }
};
