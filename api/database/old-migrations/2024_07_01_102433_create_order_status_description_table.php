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
        Schema::create('order_status_description', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order_status_id')->default(0);
            $table->integer('language_id')->default(1)->index('order_status_description_FI_2');
            $table->string('name', 128)->default('');
            $table->mediumText('message');
            $table->string('gocardless_warning')->default('');

            $table->unique(['order_status_id', 'language_id'], 'order_status_and_language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status_description');
    }
};
