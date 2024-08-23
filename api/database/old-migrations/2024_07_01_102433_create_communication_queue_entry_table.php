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
        Schema::create('communication_queue_entry', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_id')->index('member_id');
            $table->integer('outgoing_communication_id');
            $table->dateTime('queued_time');
            $table->smallInteger('is_sent')->default(0);
            $table->dateTime('sent_time')->nullable();

            $table->unique(['outgoing_communication_id', 'member_id'], 'outgoing_communication_id_and_member_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communication_queue_entry');
    }
};
