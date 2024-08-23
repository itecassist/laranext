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
        Schema::table('ticket_check_in', function (Blueprint $table) {
            $table->foreign(['ticket_id'], 'ticket_check_in_FK_1')->references(['id'])->on('ticket')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_check_in', function (Blueprint $table) {
            $table->dropForeign('ticket_check_in_FK_1');
        });
    }
};
