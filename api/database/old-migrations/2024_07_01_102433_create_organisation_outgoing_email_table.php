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
        Schema::create('organisation_outgoing_email', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('template_id');
            $table->string('subject', 128);
            $table->string('admin_name', 128)->nullable();
            $table->string('from_name', 128);
            $table->string('from_email', 128);
            $table->boolean('delivered');
            $table->date('delivered_date')->nullable();
            $table->text('template_vars')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_outgoing_email');
    }
};
