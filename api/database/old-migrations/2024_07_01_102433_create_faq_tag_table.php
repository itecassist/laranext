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
        Schema::create('faq_tag', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('tag', 128)->nullable()->unique('campaign_email_id');
            $table->string('image', 32)->nullable();
            $table->string('link_text', 64)->nullable();
            $table->integer('faq_id')->nullable()->index('faq_tag_FI_1');
            $table->tinyInteger('tag_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_tag');
    }
};
