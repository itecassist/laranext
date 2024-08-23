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
        Schema::create('organisation_email_queue_entry', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_to_organisation_id')->index('member_to_organisation_id');
            $table->integer('organisation_outgoing_email_id');
            $table->dateTime('queued_time');
            $table->boolean('sent')->default(false);
            $table->dateTime('sent_time')->nullable();

            $table->unique(['organisation_outgoing_email_id', 'member_to_organisation_id'], 'organisation_outgoing_email_id_member_to_organisation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_email_queue_entry');
    }
};
