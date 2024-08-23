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
        Schema::create('job_log', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('job_id')->index('job_log_FI_1');
            $table->string('message', 511);
            $table->tinyInteger('level');
            $table->dateTime('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_log');
    }
};
