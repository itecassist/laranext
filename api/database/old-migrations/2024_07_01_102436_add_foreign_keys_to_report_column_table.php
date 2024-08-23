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
        Schema::table('report_column', function (Blueprint $table) {
            $table->foreign(['report_id'], 'report_column_FK_1')->references(['id'])->on('report')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_column', function (Blueprint $table) {
            $table->dropForeign('report_column_FK_1');
        });
    }
};
