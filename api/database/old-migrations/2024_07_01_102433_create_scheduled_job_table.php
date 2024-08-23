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
        Schema::create('scheduled_job', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('type');
            $table->string('hostname', 64);
            $table->string('subject', 128)->nullable();
            $table->boolean('repeated');
            $table->boolean('paused');
            $table->integer('next_job_id')->nullable()->index('scheduled_job_FI_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scheduled_job');
    }
};
