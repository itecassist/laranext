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
        Schema::create('user', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username', 127);
            $table->string('email', 64)->nullable();
            $table->string('password')->nullable();
            $table->string('full_name', 127);
            $table->dateTime('last_login_time')->nullable();
            $table->dateTime('password_change_time')->nullable();
            $table->dateTime('account_locked_time')->nullable();
            $table->integer('account_lock_reason')->nullable();
            $table->integer('unsuccessful_login_count')->nullable();
            $table->boolean('password_permanent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
