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
        Schema::create('ticket_check_in', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('ticket_id')->index('ticket_check_in_FI_1');
            $table->dateTime('time_created')->nullable();
            $table->integer('direction')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_check_in');
    }
};
