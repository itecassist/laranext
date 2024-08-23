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
        Schema::create('virtual_enum_value', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('virtual_field_id')->index('virtual_enum_value_FI_1');
            $table->string('value', 64)->nullable();

            $table->unique(['virtual_field_id', 'value'], 'virtual_field_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_enum_value');
    }
};
