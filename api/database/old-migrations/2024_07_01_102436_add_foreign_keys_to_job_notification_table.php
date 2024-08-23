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
        Schema::table('job_notification', function (Blueprint $table) {
            $table->foreign(['user_id'], 'job_notification_FK_1')->references(['id'])->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['job_id'], 'job_notification_FK_2')->references(['id'])->on('job')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_notification', function (Blueprint $table) {
            $table->dropForeign('job_notification_FK_1');
            $table->dropForeign('job_notification_FK_2');
        });
    }
};
