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
        Schema::create('variation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator')->nullable();
            $table->integer('product_id')->index('variation_FI_1');
            $table->integer('variation_set_id')->nullable()->index('variation_FI_3');
            $table->string('name', 128);
            $table->string('code', 24);
            $table->integer('inventory')->nullable();
            $table->date('date_available')->nullable();
            $table->boolean('inventory_live');
            $table->boolean('published')->default(true);
            $table->integer('subscription_days')->nullable();
            $table->integer('variation_image_id')->nullable()->index('variation_FI_2');
            $table->integer('minimum')->nullable();
            $table->integer('maximum')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variation');
    }
};
