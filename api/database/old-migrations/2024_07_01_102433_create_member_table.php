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
        Schema::create('member', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 32)->nullable();
            $table->string('firstname', 32);
            $table->string('lastname', 32);
            $table->string('email', 96)->unique('email');
            $table->string('home_phone', 32)->nullable();
            $table->string('mobile_phone', 32)->nullable();
            $table->string('work_phone', 32)->nullable();
            $table->date('dob')->nullable();
            $table->string('password', 257)->nullable();
            $table->dateTime('date_of_last_logon')->nullable();
            $table->dateTime('last_2fa_time')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->integer('email_failure_count')->nullable()->default(0);
            $table->boolean('invalid')->default(false);
            $table->dateTime('invalidated_time')->nullable();
            $table->integer('default_address_id')->nullable()->index('member_FI_2');
            $table->integer('default_card_id')->nullable()->index('member_FI_3');
            $table->binary('vault')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
};
