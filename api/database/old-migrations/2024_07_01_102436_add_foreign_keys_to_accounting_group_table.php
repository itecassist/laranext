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
        Schema::table('accounting_group', function (Blueprint $table) {
            $table->foreign(['organisation_id'], 'accounting_group_FK_1')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounting_group', function (Blueprint $table) {
            $table->dropForeign('accounting_group_FK_1');
        });
    }
};
