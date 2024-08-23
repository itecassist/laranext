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
        Schema::table('advanced_forked_job_status', function (Blueprint $table) {
            $table->foreign(['organisation_id'], 'advanced_forked_job_status_organisation_id')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advanced_forked_job_status', function (Blueprint $table) {
            $table->dropForeign('advanced_forked_job_status_organisation_id');
        });
    }
};
