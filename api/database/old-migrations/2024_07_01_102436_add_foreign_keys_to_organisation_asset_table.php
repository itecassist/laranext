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
        Schema::table('organisation_asset', function (Blueprint $table) {
            $table->foreign(['organisation_id'], 'organisation_asset_organisation_id')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['organisation_product_id'], 'organisation_asset_organisation_product_id')->references(['id'])->on('organisation_product')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_asset', function (Blueprint $table) {
            $table->dropForeign('organisation_asset_organisation_id');
            $table->dropForeign('organisation_asset_organisation_product_id');
        });
    }
};
