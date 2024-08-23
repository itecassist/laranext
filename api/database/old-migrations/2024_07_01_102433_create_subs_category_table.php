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
        Schema::create('subs_category', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id');
            $table->string('seo_name');
            $table->string('name', 128);
            $table->boolean('published')->default(true);
            $table->integer('sortable_rank')->nullable();

            $table->unique(['organisation_id', 'seo_name'], 'category_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subs_category');
    }
};
