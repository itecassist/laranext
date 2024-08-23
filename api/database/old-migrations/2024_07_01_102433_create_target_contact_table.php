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
        Schema::create('target_contact', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('target_organisation_id')->index('target_contact_FI_1');
            $table->string('email', 64)->unique('email');
            $table->string('name', 64);
            $table->boolean('unsubscribed')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_contact');
    }
};
