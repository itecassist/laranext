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
        Schema::create('accounting_group', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id')->index('accounting_group_FI_1');
            $table->string('code', 16)->nullable();
            $table->string('description', 64)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounting_group');
    }
};
