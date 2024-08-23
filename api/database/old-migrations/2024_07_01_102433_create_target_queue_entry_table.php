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
        Schema::create('target_queue_entry', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('target_contact_id')->index('target_queue_entry_FI_1');
            $table->integer('target_outgoing_email_id');
            $table->dateTime('queued_time');
            $table->boolean('sent')->default(false);
            $table->dateTime('sent_time')->nullable();

            $table->unique(['target_outgoing_email_id', 'target_contact_id'], 'target_outgoing_email_id_target_contact_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_queue_entry');
    }
};
