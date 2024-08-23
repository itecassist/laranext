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
        Schema::create('outgoing_communication_attachment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('outgoing_communication_id')->index('outgoing_communication_id');
            $table->string('file', 24);
            $table->string('original_file_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outgoing_communication_attachment');
    }
};
