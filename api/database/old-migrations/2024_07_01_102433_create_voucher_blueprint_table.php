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
        Schema::create('voucher_blueprint', function (Blueprint $table) {
            $table->integer('id', true);
            $table->float('value', 10, 0);
            $table->boolean('relative');
            $table->boolean('reusable')->default(false);
            $table->string('code', 64)->nullable()->unique('code');
            $table->boolean('free_shipping');
            $table->float('minimum_purchase', 10, 0);
            $table->date('start_date')->nullable();
            $table->integer('life_time');
            $table->date('end_date')->nullable();
            $table->boolean('active');
            $table->string('description')->nullable()->unique('description');
            $table->integer('currency_id')->index('voucher_blueprint_FI_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher_blueprint');
    }
};
