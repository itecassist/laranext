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
        Schema::table('communication_queue_entry', function (Blueprint $table) {
            $table->foreign(['member_id'], 'communication_queue_entry_member')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['outgoing_communication_id'], 'communication_queue_entry_outgoing_communication')->references(['id'])->on('outgoing_communication')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('communication_queue_entry', function (Blueprint $table) {
            $table->dropForeign('communication_queue_entry_member');
            $table->dropForeign('communication_queue_entry_outgoing_communication');
        });
    }
};
