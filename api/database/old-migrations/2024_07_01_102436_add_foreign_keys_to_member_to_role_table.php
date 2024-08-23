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
        Schema::table('member_to_role', function (Blueprint $table) {
            $table->foreign(['role_id'], 'member_to_role_FK_3')->references(['id'])->on('role')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['member_to_organisation_id'], 'member_to_role_FK_4')->references(['id'])->on('member_to_organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_to_role', function (Blueprint $table) {
            $table->dropForeign('member_to_role_FK_3');
            $table->dropForeign('member_to_role_FK_4');
        });
    }
};
