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
        Schema::create('seo_ranking', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('seo_search_id');
            $table->date('date');
            $table->integer('position');
            $table->string('url');
            $table->integer('double_entry');

            $table->unique(['seo_search_id', 'date'], 'seo_search_id_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_ranking');
    }
};
