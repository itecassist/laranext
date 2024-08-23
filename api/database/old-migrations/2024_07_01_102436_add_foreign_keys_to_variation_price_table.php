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
        Schema::table('variation_price', function (Blueprint $table) {
            $table->foreign(['variation_id'], 'variation_price_FK_1')->references(['id'])->on('variation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variation_price', function (Blueprint $table) {
            $table->dropForeign('variation_price_FK_1');
        });
    }
};
