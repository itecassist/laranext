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
        Schema::create('target_sub_sector', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('target_sector_id')->index('target_sub_sector_FI_1');
            $table->string('name', 64);
            $table->string('seo_name')->nullable()->unique('target_sub_sector_slug');
            $table->text('description')->nullable();
            $table->string('seo_description')->nullable();

            $table->unique(['target_sector_id', 'name'], 'target_sector_id_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_sub_sector');
    }
};
