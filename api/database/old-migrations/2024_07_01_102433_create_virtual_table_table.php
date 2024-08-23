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
        Schema::create('virtual_table', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 64);
            $table->integer('organisation_id');

            $table->unique(['organisation_id', 'name'], 'field_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_table');
    }
};
