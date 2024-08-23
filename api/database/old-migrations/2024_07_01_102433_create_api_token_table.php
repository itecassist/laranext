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
        Schema::create('api_token', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator')->nullable();
            $table->integer('organisation_id');
            $table->integer('member_to_organisation_id')->nullable()->index('api_token_member_to_organisation_id');
            $table->char('token', 64);
            $table->string('created_by', 64);
            $table->dateTime('time_created')->nullable();

            $table->unique(['organisation_id', 'token'], 'api_token_organisation_id_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_token');
    }
};
