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
        Schema::table('api_token', function (Blueprint $table) {
            $table->foreign(['member_to_organisation_id'], 'api_token_member_to_organisation_id')->references(['id'])->on('member_to_organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['organisation_id'], 'api_token_organisation_id')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('api_token', function (Blueprint $table) {
            $table->dropForeign('api_token_member_to_organisation_id');
            $table->dropForeign('api_token_organisation_id');
        });
    }
};
