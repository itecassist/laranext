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
        Schema::table('static_text_translation', function (Blueprint $table) {
            $table->foreign(['static_text_id'], 'static_text_translation_FK_1')->references(['id'])->on('static_text')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['language_id'], 'static_text_translation_FK_2')->references(['id'])->on('language')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('static_text_translation', function (Blueprint $table) {
            $table->dropForeign('static_text_translation_FK_1');
            $table->dropForeign('static_text_translation_FK_2');
        });
    }
};
