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
        Schema::create('address', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_id')->index('address_FI_1');
            $table->string('first_line', 64);
            $table->string('second_line', 64)->nullable();
            $table->string('third_line', 64)->nullable();
            $table->string('fourth_line', 64)->nullable();
            $table->string('postcode', 20)->nullable();
            $table->integer('zone_id')->nullable()->index('address_FI_3');
            $table->integer('country_id')->index('address_FI_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
};
