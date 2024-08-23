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
        Schema::create('site_visit', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('visitor_id')->nullable()->index('site_visit_FI_1');
            $table->unsignedInteger('ip')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('last_click_time')->nullable();
            $table->integer('referer_id')->nullable()->index('site_visit_FI_2');
            $table->integer('http_referer_id')->nullable()->index('site_visit_FI_3');
            $table->boolean('cookies_blocked')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_visit');
    }
};
