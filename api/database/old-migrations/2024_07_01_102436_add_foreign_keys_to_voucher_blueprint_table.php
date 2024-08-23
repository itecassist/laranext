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
        Schema::table('voucher_blueprint', function (Blueprint $table) {
            $table->foreign(['currency_id'], 'voucher_blueprint_FK_1')->references(['id'])->on('currency')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voucher_blueprint', function (Blueprint $table) {
            $table->dropForeign('voucher_blueprint_FK_1');
        });
    }
};
