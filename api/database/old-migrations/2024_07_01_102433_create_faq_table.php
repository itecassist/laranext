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
        Schema::create('faq', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('faq_category_id')->index('faq_FI_1');
            $table->string('question', 64)->nullable();
            $table->text('answer')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('display_on_help');
            $table->boolean('paused');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq');
    }
};
