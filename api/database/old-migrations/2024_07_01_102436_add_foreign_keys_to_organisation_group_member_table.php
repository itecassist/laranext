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
        Schema::table('organisation_group_member', function (Blueprint $table) {
            $table->foreign(['organisation_id', 'organisation_group_id'], 'organisation_group_member_FK_1')->references(['organisation_id', 'id'])->on('organisation_group')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['member_id'], 'organisation_group_member_FK_2')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_group_member', function (Blueprint $table) {
            $table->dropForeign('organisation_group_member_FK_1');
            $table->dropForeign('organisation_group_member_FK_2');
        });
    }
};
