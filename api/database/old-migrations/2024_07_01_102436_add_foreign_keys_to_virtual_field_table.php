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
        Schema::table('virtual_field', function (Blueprint $table) {
            $table->foreign(['virtual_table_id'], 'virtual_field_FK_1')->references(['id'])->on('virtual_table')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['multi_radio_option_enum_value_id'], 'virtual_field_multi_radio_option_enum_value_id')->references(['id'])->on('virtual_enum_value')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('virtual_field', function (Blueprint $table) {
            $table->dropForeign('virtual_field_FK_1');
            $table->dropForeign('virtual_field_multi_radio_option_enum_value_id');
        });
    }
};
