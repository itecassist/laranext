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
        Schema::table('outgoing_communication', function (Blueprint $table) {
            $table->foreign(['reply_to_member_id'], 'outgoing_communication_ibfk_1')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['organisation_id'], 'outgoing_communication_organisation')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outgoing_communication', function (Blueprint $table) {
            $table->dropForeign('outgoing_communication_ibfk_1');
            $table->dropForeign('outgoing_communication_organisation');
        });
    }
};
