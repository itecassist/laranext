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
        Schema::table('scheduled_job', function (Blueprint $table) {
            $table->foreign(['next_job_id'], 'scheduled_job_FK_1')->references(['id'])->on('scheduled_job')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scheduled_job', function (Blueprint $table) {
            $table->dropForeign('scheduled_job_FK_1');
        });
    }
};
