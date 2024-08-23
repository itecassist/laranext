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
        Schema::table('set_member', function (Blueprint $table) {
            $table->foreign(['set_id'], 'set_member_FK_1')->references(['id'])->on('set')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['member_to_organisation_id'], 'set_member_FK_2')->references(['id'])->on('member_to_organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('set_member', function (Blueprint $table) {
            $table->dropForeign('set_member_FK_1');
            $table->dropForeign('set_member_FK_2');
        });
    }
};
