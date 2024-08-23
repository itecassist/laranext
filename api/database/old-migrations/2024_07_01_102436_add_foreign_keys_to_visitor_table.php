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
        Schema::table('visitor', function (Blueprint $table) {
            $table->foreign(['first_site_visit_id'], 'visitor_FK_1')->references(['id'])->on('site_visit')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitor', function (Blueprint $table) {
            $table->dropForeign('visitor_FK_1');
        });
    }
};
