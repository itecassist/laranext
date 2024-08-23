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
        Schema::create('organisation_order_lineitem', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator');
            $table->integer('organisation_order_id')->index('organisation_order_id');
            $table->integer('previous_organisation_product_id')->nullable()->index('previous_organisation_product_id');
            $table->integer('organisation_product_id')->index('organisation_product_id');
            $table->integer('quantity');
            $table->integer('organisation_asset_id')->nullable()->index('organisation_asset_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('description');
            $table->string('notes')->nullable();
            $table->decimal('value_without_tax', 15, 6);
            $table->decimal('value_with_tax', 15, 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_order_lineitem');
    }
};
