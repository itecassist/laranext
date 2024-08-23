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
        Schema::create('job_notification', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->index('job_notification_FI_1');
            $table->integer('job_id')->index('job_notification_FI_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_notification');
    }
};
