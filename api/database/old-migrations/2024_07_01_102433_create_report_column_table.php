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
        Schema::create('report_column', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator');
            $table->integer('report_id')->index('report_column_FI_1');
            $table->string('name', 64)->nullable();
            $table->integer('field')->nullable();
            $table->string('value', 64)->nullable();
            $table->integer('sortable_rank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_column');
    }
};
