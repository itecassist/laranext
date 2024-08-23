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
        Schema::table('event_to_category', function (Blueprint $table) {
            $table->foreign(['category_id'], 'event_to_category_FK_1')->references(['id'])->on('category')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['event_id'], 'event_to_category_FK_2')->references(['id'])->on('event')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_to_category', function (Blueprint $table) {
            $table->dropForeign('event_to_category_FK_1');
            $table->dropForeign('event_to_category_FK_2');
        });
    }
};
