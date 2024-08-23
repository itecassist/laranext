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
        Schema::create('tax_rate', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('tax_zone_id');
            $table->integer('tax_class_id')->index('tax_rate_FI_2');
            $table->decimal('rate', 7, 4)->nullable();
            $table->string('description')->nullable();
            $table->dateTime('date_last_modified')->nullable();
            $table->dateTime('date_added')->nullable();

            $table->unique(['tax_zone_id', 'tax_class_id'], 'tax_zone_and_class_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_rate');
    }
};
