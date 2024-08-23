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
        Schema::create('virtual_multi_enum_value', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('virtual_value_id')->index('virtual_multi_enum_value_FI_1');
            $table->integer('virtual_enum_value_id')->index('virtual_multi_enum_value_FI_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_multi_enum_value');
    }
};
