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
        Schema::create('organisation_group', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 64)->nullable();
            $table->integer('unique_id');
            $table->integer('organisation_id');

            $table->index(['organisation_id', 'id'], 'I_referenced_organisation_group_member_FK_1_1');
            $table->unique(['organisation_id', 'unique_id'], 'organisation_id_and_unique_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_group');
    }
};
