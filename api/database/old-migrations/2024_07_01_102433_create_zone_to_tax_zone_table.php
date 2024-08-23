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
        Schema::create('zone_to_tax_zone', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('country_id')->index('zone_to_tax_zone_FI_3');
            $table->integer('zone_id')->nullable()->index('zone_to_tax_zone_FI_1');
            $table->integer('tax_zone_id')->nullable()->index('zone_to_tax_zone_FI_2');
            $table->dateTime('date_last_modified')->nullable();
            $table->dateTime('date_added');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zone_to_tax_zone');
    }
};
