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
        Schema::table('site_visit', function (Blueprint $table) {
            $table->foreign(['visitor_id'], 'site_visit_FK_1')->references(['id'])->on('visitor')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['referer_id'], 'site_visit_FK_2')->references(['id'])->on('referer')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['http_referer_id'], 'site_visit_FK_3')->references(['id'])->on('http_referer')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_visit', function (Blueprint $table) {
            $table->dropForeign('site_visit_FK_1');
            $table->dropForeign('site_visit_FK_2');
            $table->dropForeign('site_visit_FK_3');
        });
    }
};
