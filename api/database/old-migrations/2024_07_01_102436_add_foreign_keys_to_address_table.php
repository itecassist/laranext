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
        Schema::table('address', function (Blueprint $table) {
            $table->foreign(['member_id'], 'address_FK_1')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['zone_id'], 'address_FK_3')->references(['id'])->on('zone')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['country_id'], 'address_FK_4')->references(['id'])->on('country')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('address', function (Blueprint $table) {
            $table->dropForeign('address_FK_1');
            $table->dropForeign('address_FK_3');
            $table->dropForeign('address_FK_4');
        });
    }
};
