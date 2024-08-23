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
        Schema::create('job', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('scheduled_job_id')->nullable()->index('job_FI_1');
            $table->integer('pid');
            $table->boolean('pid_valid')->default(true);
            $table->string('hostname', 64);
            $table->string('subject', 128)->nullable();
            $table->integer('discriminator');
            $table->string('params')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('stop_time')->nullable();
            $table->integer('memory_usage');
            $table->dateTime('last_communication_time')->nullable();
            $table->tinyInteger('status');
            $table->integer('next_job_id')->nullable()->index('job_FI_2');

            $table->index(['status', 'last_communication_time'], 'last_communication_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job');
    }
};
