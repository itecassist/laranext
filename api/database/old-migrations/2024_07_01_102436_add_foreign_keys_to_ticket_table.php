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
        Schema::table('ticket', function (Blueprint $table) {
            $table->foreign(['product_id'], 'ticket_FK_1')->references(['id'])->on('product')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['variation_id'], 'ticket_FK_2')->references(['id'])->on('variation')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['member_id'], 'ticket_FK_3')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['organisation_id'], 'ticket_FK_4')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['virtual_record_id'], 'ticket_FK_5')->references(['id'])->on('virtual_record')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->dropForeign('ticket_FK_1');
            $table->dropForeign('ticket_FK_2');
            $table->dropForeign('ticket_FK_3');
            $table->dropForeign('ticket_FK_4');
            $table->dropForeign('ticket_FK_5');
        });
    }
};
