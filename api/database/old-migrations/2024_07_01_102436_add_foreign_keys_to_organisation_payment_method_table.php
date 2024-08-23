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
        Schema::table('organisation_payment_method', function (Blueprint $table) {
            $table->foreign(['accounting_group_id'], 'organisation_payment_method_accounting_group_id')->references(['id'])->on('accounting_group')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['organisation_id'], 'organisation_payment_method_FK_1')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_payment_method', function (Blueprint $table) {
            $table->dropForeign('organisation_payment_method_accounting_group_id');
            $table->dropForeign('organisation_payment_method_FK_1');
        });
    }
};
