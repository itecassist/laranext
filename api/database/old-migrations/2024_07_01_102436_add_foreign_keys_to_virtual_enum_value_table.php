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
        Schema::table('virtual_enum_value', function (Blueprint $table) {
            $table->foreign(['virtual_field_id'], 'virtual_enum_value_FK_1')->references(['id'])->on('virtual_field')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('virtual_enum_value', function (Blueprint $table) {
            $table->dropForeign('virtual_enum_value_FK_1');
        });
    }
};
