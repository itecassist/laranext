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
        Schema::create('article_category', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 64);
            $table->text('description');
            $table->boolean('live')->default(false);
            $table->boolean('article_live')->default(false);
            $table->integer('section_id');
            $table->integer('tree_left')->nullable();
            $table->integer('tree_right')->nullable();
            $table->integer('tree_level')->nullable();
            $table->string('seo_name')->nullable()->unique('article_category_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_category');
    }
};
