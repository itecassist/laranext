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
        Schema::create('organisation_product', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator');
            $table->string('name', 64);
            $table->text('description')->nullable();
            $table->integer('units')->nullable();
            $table->boolean('published')->default(true);
            $table->decimal('price', 15, 6)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_product');
    }
};
