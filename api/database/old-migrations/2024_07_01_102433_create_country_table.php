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
        Schema::create('country', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 64)->unique('name');
            $table->char('iso_code_2', 2)->nullable();
            $table->char('iso_code_3', 3)->nullable();
            $table->integer('address_format_id')->nullable();
            $table->boolean('postcode_required')->nullable();
            $table->boolean('postcode_used_for_zone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country');
    }
};
