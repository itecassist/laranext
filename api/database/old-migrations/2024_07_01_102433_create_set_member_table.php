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
        Schema::create('set_member', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('set_id');
            $table->integer('member_to_organisation_id')->index('set_member_FI_2');
            $table->integer('role')->default(0);

            $table->unique(['set_id', 'member_to_organisation_id'], 'set_and_member_to_organisation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('set_member');
    }
};
