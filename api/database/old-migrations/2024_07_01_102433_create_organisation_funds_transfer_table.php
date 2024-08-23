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
        Schema::create('organisation_funds_transfer', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator');
            $table->integer('organisation_account_id')->index('organisation_account_id');
            $table->string('xero_id', 40)->nullable()->unique('xero_id');
            $table->dateTime('time_made')->nullable();
            $table->integer('method');
            $table->decimal('amount', 15, 6);
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
        Schema::dropIfExists('organisation_funds_transfer');
    }
};
