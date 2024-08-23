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
        Schema::table('target_queue_entry', function (Blueprint $table) {
            $table->foreign(['target_contact_id'], 'target_queue_entry_FK_1')->references(['id'])->on('target_contact')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['target_outgoing_email_id'], 'target_queue_entry_FK_2')->references(['id'])->on('target_outgoing_email')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_queue_entry', function (Blueprint $table) {
            $table->dropForeign('target_queue_entry_FK_1');
            $table->dropForeign('target_queue_entry_FK_2');
        });
    }
};
