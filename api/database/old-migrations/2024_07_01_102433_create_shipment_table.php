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
        Schema::create('shipment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator');
            $table->integer('order_id')->index('shipment_FI_1');
            $table->integer('address_id')->nullable()->index('shipment_FI_2');
            $table->string('full_name', 64);
            $table->string('company', 32)->nullable();
            $table->string('first_line', 64);
            $table->string('second_line', 64);
            $table->string('third_line', 64)->nullable();
            $table->string('fourth_line', 64)->nullable();
            $table->string('postcode', 10);
            $table->string('zone', 32)->nullable();
            $table->string('country', 64)->nullable();
            $table->string('shipping_option_code', 10)->nullable();
            $table->string('delivery_tracking_url', 64)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment');
    }
};
