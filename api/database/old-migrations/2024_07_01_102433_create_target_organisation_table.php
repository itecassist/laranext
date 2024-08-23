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
        Schema::create('target_organisation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('target_sub_sector_id')->index('target_organisation_FI_1');
            $table->string('name', 64)->unique('name');
            $table->string('website')->unique('website');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_organisation');
    }
};
