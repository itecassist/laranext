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
        Schema::table('event', function (Blueprint $table) {
            $table->foreign(['organisation_id'], 'event_FK_1')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['accounting_group_id'], 'event_FK_3')->references(['id'])->on('accounting_group')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['email_contact_id'], 'event_FK_4')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['virtual_table_id'], 'event_FK_5')->references(['id'])->on('virtual_table')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['next_event_id'], 'event_next_event_id')->references(['id'])->on('event')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event', function (Blueprint $table) {
            $table->dropForeign('event_FK_1');
            $table->dropForeign('event_FK_3');
            $table->dropForeign('event_FK_4');
            $table->dropForeign('event_FK_5');
            $table->dropForeign('event_next_event_id');
        });
    }
};
