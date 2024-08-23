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
        Schema::table('article_to_article_category', function (Blueprint $table) {
            $table->foreign(['article_category_id'], 'article_to_article_category_article_category_id')->references(['id'])->on('article_category')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['article_id'], 'article_to_article_category_article_id')->references(['id'])->on('article')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_to_article_category', function (Blueprint $table) {
            $table->dropForeign('article_to_article_category_article_category_id');
            $table->dropForeign('article_to_article_category_article_id');
        });
    }
};
