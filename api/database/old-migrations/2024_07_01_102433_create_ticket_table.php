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
        Schema::create('ticket', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('product_id')->index('ticket_FI_1');
            $table->integer('variation_id')->index('ticket_FI_2');
            $table->integer('member_id')->nullable()->index('ticket_FI_3');
            $table->integer('organisation_id')->index('ticket_FI_4');
            $table->integer('virtual_record_id')->nullable()->unique('virtual_record_id');
            $table->dateTime('time_created')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
};
