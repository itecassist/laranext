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
        Schema::create('currency', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 32);
            $table->char('code', 3);
            $table->string('symbol_left', 12)->nullable();
            $table->string('html_symbol_left', 12)->nullable();
            $table->string('symbol_right', 12)->nullable();
            $table->string('html_symbol_right', 12)->nullable();
            $table->char('decimal_point', 1)->nullable();
            $table->char('thousands_point', 1)->nullable();
            $table->char('decimal_places', 1)->nullable();
            $table->float('value', 10, 0)->nullable();
            $table->float('spread', 10, 0)->nullable();
            $table->dateTime('last_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency');
    }
};
