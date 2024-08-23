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
        Schema::create('page_visit', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('site_visit_id')->index('page_visit_FI_1');
            $table->integer('visited_page_id')->index('page_visit_FI_2');
            $table->dateTime('time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_visit');
    }
};
