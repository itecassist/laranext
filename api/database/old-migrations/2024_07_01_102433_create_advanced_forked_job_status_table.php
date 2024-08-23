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
        Schema::create('advanced_forked_job_status', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id')->index('organisation_id');
            $table->string('job_class', 64)->nullable();
            $table->string('action', 64)->nullable();
            $table->string('filename_extension', 5)->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('stop_time')->nullable();
            $table->integer('memory_usage');
            $table->dateTime('last_communication_time')->nullable();
            $table->binary('input')->nullable();
            $table->binary('status_vars')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advanced_forked_job_status');
    }
};
