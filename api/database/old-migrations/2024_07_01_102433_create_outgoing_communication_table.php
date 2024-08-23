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
        Schema::create('outgoing_communication', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator')->nullable();
            $table->integer('template_id');
            $table->integer('organisation_id')->index('organisation_id');
            $table->string('subject', 128);
            $table->integer('reply_to_member_id')->nullable()->index('reply_to_member_id');
            $table->date('created_date');
            $table->boolean('scheduled_for_sending');
            $table->boolean('delivered');
            $table->date('delivered_date')->nullable();
            $table->binary('template_vars')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outgoing_communication');
    }
};
