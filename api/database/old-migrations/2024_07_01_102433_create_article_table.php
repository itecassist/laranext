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
        Schema::create('article', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('type')->default(1);
            $table->string('title');
            $table->text('content');
            $table->text('summary')->nullable();
            $table->string('seo_description')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('live')->default(false);
            $table->boolean('category_live')->default(false);
            $table->integer('popularity')->default(0);
            $table->dateTime('last_modified');
            $table->string('page_title')->nullable();
            $table->string('seo_name')->nullable()->unique('article_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
};
