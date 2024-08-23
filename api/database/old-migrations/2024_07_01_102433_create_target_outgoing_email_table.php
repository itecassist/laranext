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
        Schema::create('target_outgoing_email', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('template_id');
            $table->string('subject', 128);
            $table->string('from_name', 128);
            $table->string('from_email', 128);
            $table->boolean('delivered');
            $table->date('delivered_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_outgoing_email');
    }
};
