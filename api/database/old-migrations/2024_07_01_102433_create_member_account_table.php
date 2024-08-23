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
        Schema::create('member_account', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id');
            $table->integer('member_id')->nullable()->index('member_id');
            $table->string('email', 96)->nullable();
            $table->string('name')->nullable();

            $table->unique(['organisation_id', 'member_id'], 'organisation_id_member_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_account');
    }
};
