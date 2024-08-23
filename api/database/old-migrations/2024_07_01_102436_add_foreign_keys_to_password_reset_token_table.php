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
        Schema::table('password_reset_token', function (Blueprint $table) {
            $table->foreign(['member_id'], 'api_token_member_id')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('password_reset_token', function (Blueprint $table) {
            $table->dropForeign('api_token_member_id');
        });
    }
};
