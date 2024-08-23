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
        Schema::create('static_text_translation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('static_text_id')->index('static_text_translation_FI_1');
            $table->text('text')->nullable();
            $table->integer('language_id')->index('static_text_translation_FI_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_text_translation');
    }
};
