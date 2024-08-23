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
        Schema::create('sub_to_category', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('subs_category_id');
            $table->integer('product_id')->index('sub_to_category_FI_2');
            $table->integer('sortable_rank')->nullable();

            $table->unique(['subs_category_id', 'product_id'], 'subs_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_to_category');
    }
};
