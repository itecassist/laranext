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
        Schema::create('variation_price', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('variation_id');
            $table->decimal('price', 15, 4)->default(0);
            $table->integer('start_day')->nullable();
            $table->integer('start_month')->nullable();

            $table->unique(['variation_id', 'start_month', 'start_day'], 'start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variation_price');
    }
};
