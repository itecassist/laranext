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
        Schema::table('page_visit', function (Blueprint $table) {
            $table->foreign(['site_visit_id'], 'page_visit_FK_1')->references(['id'])->on('site_visit')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['visited_page_id'], 'page_visit_FK_2')->references(['id'])->on('visited_page')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_visit', function (Blueprint $table) {
            $table->dropForeign('page_visit_FK_1');
            $table->dropForeign('page_visit_FK_2');
        });
    }
};
