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
        Schema::create('organisation_asset', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id');
            $table->integer('organisation_product_discriminator');
            $table->integer('organisation_product_id')->nullable()->index('organisation_product_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('units')->nullable();

            $table->unique(['organisation_id', 'organisation_product_discriminator'], 'organisation_id_organisation_product_discriminator');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_asset');
    }
};
