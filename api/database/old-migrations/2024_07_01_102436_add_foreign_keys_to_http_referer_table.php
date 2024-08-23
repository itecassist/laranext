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
        Schema::table('http_referer', function (Blueprint $table) {
            $table->foreign(['domain_id'], 'http_referer_FK_1')->references(['id'])->on('http_referer_domain')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('http_referer', function (Blueprint $table) {
            $table->dropForeign('http_referer_FK_1');
        });
    }
};
