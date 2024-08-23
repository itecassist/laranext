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
        Schema::table('organisation_order_lineitem', function (Blueprint $table) {
            $table->foreign(['organisation_asset_id'], 'organisation_order_lineitem_organisation_asset_id')->references(['id'])->on('organisation_asset')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['organisation_order_id'], 'organisation_order_lineitem_organisation_order_id')->references(['id'])->on('organisation_order')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['organisation_product_id'], 'organisation_order_lineitem_organisation_product_id')->references(['id'])->on('organisation_product')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['previous_organisation_product_id'], 'organisation_order_lineitem_previous_organisation_product_id')->references(['id'])->on('organisation_product')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation_order_lineitem', function (Blueprint $table) {
            $table->dropForeign('organisation_order_lineitem_organisation_asset_id');
            $table->dropForeign('organisation_order_lineitem_organisation_order_id');
            $table->dropForeign('organisation_order_lineitem_organisation_product_id');
            $table->dropForeign('organisation_order_lineitem_previous_organisation_product_id');
        });
    }
};
