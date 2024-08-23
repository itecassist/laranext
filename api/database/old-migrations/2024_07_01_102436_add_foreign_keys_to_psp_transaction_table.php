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
        Schema::table('psp_transaction', function (Blueprint $table) {
            $table->foreign(['payment_id'], 'psp_transaction_FK_1')->references(['id'])->on('payment')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('psp_transaction', function (Blueprint $table) {
            $table->dropForeign('psp_transaction_FK_1');
        });
    }
};
