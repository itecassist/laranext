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
        Schema::create('category', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id');
            $table->string('seo_name');
            $table->string('name', 128);
            $table->text('description')->nullable();
            $table->string('image', 16)->nullable();
            $table->integer('tree_left')->nullable();
            $table->integer('tree_right')->nullable();
            $table->integer('tree_level')->nullable();
            $table->boolean('published')->default(true);

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
        Schema::dropIfExists('category');
    }
};
