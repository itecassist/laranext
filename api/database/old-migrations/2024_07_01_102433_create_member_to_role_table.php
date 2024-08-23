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
        Schema::create('member_to_role', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_to_organisation_id')->index('member_to_role_FK_4');
            $table->integer('role_id')->index('member_to_role_FI_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_to_role');
    }
};
