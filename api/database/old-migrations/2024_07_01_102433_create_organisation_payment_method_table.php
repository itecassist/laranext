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
        Schema::create('organisation_payment_method', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator');
            $table->integer('organisation_id')->index('organisation_payment_method_FI_1');
            $table->decimal('surcharge_percentage_value', 10, 3)->default(0);
            $table->decimal('surcharge_absolute_value', 10, 4)->default(0);
            $table->integer('accounting_group_id')->nullable()->index('accounting_group_id');
            $table->binary('vault')->nullable();
            $table->text('explanatory_checkout_text')->nullable();
            $table->text('checkout_success_text')->nullable();
            $table->string('gc_last_processed_event_id')->nullable();
            $table->boolean('custom_send_email')->default(true);
            $table->boolean('custom_clears_automatically')->default(true);

            $table->unique(['discriminator', 'organisation_id'], 'discriminator_and_organisation_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_payment_method');
    }
};
