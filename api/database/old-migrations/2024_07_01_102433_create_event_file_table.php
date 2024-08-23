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
        Schema::create('event_file', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('event_id');
            $table->string('file', 24);
            $table->string('name');
            $table->string('label', 128);

            $table->unique(['event_id', 'name'], 'event_id_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_file');
    }
};
