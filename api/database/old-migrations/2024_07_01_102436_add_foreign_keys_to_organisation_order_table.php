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
        Schema::table('organisation_order', function (Blueprint $table) {
            $table->foreign(['organisation_account_id'], 'organisation_order_organisation_account_id')->references(['id'])->on('organisation_account')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_order', function (Blueprint $table) {
            $table->dropForeign('organisation_order_organisation_account_id');
        });
    }
};
