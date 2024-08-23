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
        Schema::table('organisation', function (Blueprint $table) {
            $table->foreign(['currency_id'], 'organisation_currency_id')->references(['id'])->on('currency')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['default_address_country_id'], 'organisation_default_address_country_id')->references(['id'])->on('country')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['default_payment_method_id'], 'organisation_default_payment_method_id')->references(['id'])->on('organisation_payment_method')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['target_sub_sector_id'], 'organisation_target_sub_sector_id')->references(['id'])->on('target_sub_sector')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['tax_class_id'], 'organisation_tax_class_id')->references(['id'])->on('tax_class')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['video_id'], 'organisation_video_id')->references(['id'])->on('video')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['virtual_table_id'], 'organisation_virtual_table_id')->references(['id'])->on('virtual_table')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organisation', function (Blueprint $table) {
            $table->dropForeign('organisation_currency_id');
            $table->dropForeign('organisation_default_address_country_id');
            $table->dropForeign('organisation_default_payment_method_id');
            $table->dropForeign('organisation_target_sub_sector_id');
            $table->dropForeign('organisation_tax_class_id');
            $table->dropForeign('organisation_video_id');
            $table->dropForeign('organisation_virtual_table_id');
        });
    }
};
