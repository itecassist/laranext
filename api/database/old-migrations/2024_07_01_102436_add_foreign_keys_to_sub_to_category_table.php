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
        Schema::table('sub_to_category', function (Blueprint $table) {
            $table->foreign(['subs_category_id'], 'sub_to_category_FK_1')->references(['id'])->on('subs_category')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'sub_to_category_FK_2')->references(['id'])->on('product')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_to_category', function (Blueprint $table) {
            $table->dropForeign('sub_to_category_FK_1');
            $table->dropForeign('sub_to_category_FK_2');
        });
    }
};
