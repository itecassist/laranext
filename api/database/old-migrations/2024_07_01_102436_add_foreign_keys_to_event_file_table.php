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
        Schema::table('event_file', function (Blueprint $table) {
            $table->foreign(['event_id'], 'event_file_FK_1')->references(['id'])->on('event')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_file', function (Blueprint $table) {
            $table->dropForeign('event_file_FK_1');
        });
    }
};
