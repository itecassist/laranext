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
        Schema::table('tax_rate', function (Blueprint $table) {
            $table->foreign(['tax_zone_id'], 'tax_rate_FK_1')->references(['id'])->on('tax_zone')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['tax_class_id'], 'tax_rate_FK_2')->references(['id'])->on('tax_class')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tax_rate', function (Blueprint $table) {
            $table->dropForeign('tax_rate_FK_1');
            $table->dropForeign('tax_rate_FK_2');
        });
    }
};
