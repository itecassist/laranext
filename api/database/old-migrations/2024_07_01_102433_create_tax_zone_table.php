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
        Schema::create('tax_zone', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 32);
            $table->string('description');
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
        Schema::dropIfExists('tax_zone');
    }
};
