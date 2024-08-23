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
        Schema::table('seo_ranking', function (Blueprint $table) {
            $table->foreign(['seo_search_id'], 'seo_ranking_FK_1')->references(['id'])->on('seo_search')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seo_ranking', function (Blueprint $table) {
            $table->dropForeign('seo_ranking_FK_1');
        });
    }
};
