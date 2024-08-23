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
        Schema::table('organisation_account', function (Blueprint $table) {
            $table->foreign(['organisation_id'], 'organisation_order_organisation_id')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_account', function (Blueprint $table) {
            $table->dropForeign('organisation_order_organisation_id');
        });
    }
};
