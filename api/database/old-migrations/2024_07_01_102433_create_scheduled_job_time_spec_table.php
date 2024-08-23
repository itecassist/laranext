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
        Schema::create('scheduled_job_time_spec', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('scheduled_job_id')->index('scheduled_job_time_spec_FI_1');
            $table->string('hour', 32)->nullable();
            $table->string('minute', 32)->nullable();
            $table->string('day_of_month', 32)->nullable();
            $table->string('month', 32)->nullable();
            $table->string('weekday', 32)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduled_job_time_spec');
    }
};
