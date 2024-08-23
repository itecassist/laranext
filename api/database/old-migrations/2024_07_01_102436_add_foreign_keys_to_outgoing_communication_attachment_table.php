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
        Schema::table('outgoing_communication_attachment', function (Blueprint $table) {
            $table->foreign(['outgoing_communication_id'], 'outgoing_communication_attachment_ibfk_1')->references(['id'])->on('outgoing_communication')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outgoing_communication_attachment', function (Blueprint $table) {
            $table->dropForeign('outgoing_communication_attachment_ibfk_1');
        });
    }
};
