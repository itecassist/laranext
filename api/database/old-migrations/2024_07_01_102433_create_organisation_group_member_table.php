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
        Schema::create('organisation_group_member', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id');
            $table->integer('organisation_group_id');
            $table->integer('member_id')->index('organisation_group_member_FI_2');
            $table->boolean('admin')->default(false);
            $table->boolean('approved')->default(false);

            $table->unique(['organisation_group_id', 'member_id'], 'member_and_organisation_group_unique');
            $table->unique(['organisation_id', 'member_id'], 'member_and_organisation_unique');
            $table->index(['organisation_id', 'organisation_group_id'], 'organisation_group_member_FI_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_group_member');
    }
};
