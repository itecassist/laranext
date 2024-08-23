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
        Schema::create('target_sector', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 64)->unique('name');
            $table->string('seo_name')->nullable()->unique('target_sector_slug');
            $table->text('description')->nullable();
            $table->string('seo_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_sector');
    }
};
