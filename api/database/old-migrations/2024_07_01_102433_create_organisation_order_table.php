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
        Schema::create('organisation_order', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator');
            $table->integer('organisation_account_id')->index('organisation_account_id');
            $table->integer('invoice_number')->unique('invoice_number');
            $table->dateTime('date_purchased');
            $table->dateTime('date_sent')->nullable();
            $table->string('xero_id', 40)->nullable()->unique('xero_id');
            $table->dateTime('xero_date_uploaded')->nullable();
            $table->dateTime('xero_date_paid')->nullable();
            $table->boolean('hidden')->default(false);
            $table->text('comments')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_order');
    }
};
