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
        Schema::table('variation', function (Blueprint $table) {
            $table->foreign(['product_id'], 'variation_FK_1')->references(['id'])->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['variation_image_id'], 'variation_FK_2')->references(['id'])->on('variation_image')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['variation_set_id'], 'variation_FK_3')->references(['id'])->on('variation_set')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variation', function (Blueprint $table) {
            $table->dropForeign('variation_FK_1');
            $table->dropForeign('variation_FK_2');
            $table->dropForeign('variation_FK_3');
        });
    }
};
