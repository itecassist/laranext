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
        Schema::table('zone_to_tax_zone', function (Blueprint $table) {
            $table->foreign(['zone_id'], 'zone_to_tax_zone_FK_1')->references(['id'])->on('zone')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['tax_zone_id'], 'zone_to_tax_zone_FK_2')->references(['id'])->on('tax_zone')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['country_id'], 'zone_to_tax_zone_FK_3')->references(['id'])->on('country')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zone_to_tax_zone', function (Blueprint $table) {
            $table->dropForeign('zone_to_tax_zone_FK_1');
            $table->dropForeign('zone_to_tax_zone_FK_2');
            $table->dropForeign('zone_to_tax_zone_FK_3');
        });
    }
};
