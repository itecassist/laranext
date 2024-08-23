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
        Schema::table('payment_method', function (Blueprint $table) {
            $table->foreign(['member_id'], 'payment_method_FK_1')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['cardholder_address_id'], 'payment_method_FK_2')->references(['id'])->on('address')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['organisation_id'], 'payment_method_organisation_id')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_method', function (Blueprint $table) {
            $table->dropForeign('payment_method_FK_1');
            $table->dropForeign('payment_method_FK_2');
            $table->dropForeign('payment_method_organisation_id');
        });
    }
};
