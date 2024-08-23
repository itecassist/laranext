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
        Schema::table('faq_tag', function (Blueprint $table) {
            $table->foreign(['faq_id'], 'faq_tag_FK_1')->references(['id'])->on('faq')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faq_tag', function (Blueprint $table) {
            $table->dropForeign('faq_tag_FK_1');
        });
    }
};
