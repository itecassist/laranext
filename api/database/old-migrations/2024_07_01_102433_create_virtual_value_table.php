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
        Schema::create('virtual_value', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('virtual_record_id')->index('virtual_value_FI_1');
            $table->integer('virtual_field_id')->index('virtual_value_FI_2');
            $table->boolean('boolean_value')->nullable();
            $table->integer('integer_value')->nullable();
            $table->dateTime('timestamp_value')->nullable();
            $table->date('date_value')->nullable();
            $table->string('varchar_value')->nullable();
            $table->text('long_varchar_value')->nullable();
            $table->integer('virtual_enum_value_id')->nullable()->index('virtual_value_FI_3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_value');
    }
};
