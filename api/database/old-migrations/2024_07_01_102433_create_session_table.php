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
        Schema::create('session', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('session_cookie_hash', 48)->nullable()->unique('session_cookie_hash');
            $table->integer('site_visit_id')->nullable()->index('session_FI_1');
            $table->binary('content');
            $table->dateTime('mtime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session');
    }
};
