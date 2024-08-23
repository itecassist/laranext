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
        Schema::create('seo_search', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('seo_site_id');
            $table->string('phrase', 64);
            $table->integer('traffic_estimate')->nullable();

            $table->unique(['seo_site_id', 'phrase'], 'site_id_phrase');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_search');
    }
};
