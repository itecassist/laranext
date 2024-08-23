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
        Schema::create('password_reset_token', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_id')->index('member_id');
            $table->char('token', 32)->unique('token');
            $table->dateTime('time_created')->nullable();
            $table->dateTime('valid_until')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_reset_token');
    }
};
