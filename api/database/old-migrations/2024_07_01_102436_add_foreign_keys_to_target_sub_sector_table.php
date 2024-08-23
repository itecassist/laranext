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
        Schema::table('target_sub_sector', function (Blueprint $table) {
            $table->foreign(['target_sector_id'], 'target_sub_sector_FK_1')->references(['id'])->on('target_sector')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_sub_sector', function (Blueprint $table) {
            $table->dropForeign('target_sub_sector_FK_1');
        });
    }
};
