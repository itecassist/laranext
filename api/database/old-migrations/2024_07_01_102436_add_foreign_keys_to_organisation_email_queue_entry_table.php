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
        Schema::table('organisation_email_queue_entry', function (Blueprint $table) {
            $table->foreign(['member_to_organisation_id'], 'organisation_email_queue_entry_member_to_organisation_id')->references(['id'])->on('member_to_organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['organisation_outgoing_email_id'], 'organisation_email_queue_entry_organisation_outgoing_email_id')->references(['id'])->on('organisation_outgoing_email')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_email_queue_entry', function (Blueprint $table) {
            $table->dropForeign('organisation_email_queue_entry_member_to_organisation_id');
            $table->dropForeign('organisation_email_queue_entry_organisation_outgoing_email_id');
        });
    }
};
