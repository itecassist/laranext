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
        Schema::create('event_to_category', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('category_id');
            $table->integer('event_id')->index('event_to_category_FI_2');

            $table->unique(['category_id', 'event_id'], 'category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_to_category');
    }
};
