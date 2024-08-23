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
        Schema::table('job_log', function (Blueprint $table) {
            $table->foreign(['job_id'], 'job_log_FK_1')->references(['id'])->on('job')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_log', function (Blueprint $table) {
            $table->dropForeign('job_log_FK_1');
        });
    }
};
