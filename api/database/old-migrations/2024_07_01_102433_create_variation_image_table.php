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
        Schema::create('variation_image', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('swatch')->nullable();
            $table->integer('product_id')->index('variation_image_FI_1');
            $table->string('image', 16)->nullable();
            $table->integer('sort_order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variation_image');
    }
};
