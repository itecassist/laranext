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
        Schema::create('payment', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator');
            $table->integer('order_id')->nullable()->index('order_id');
            $table->integer('organisation_payment_method_id')->nullable()->index('organisation_payment_method_id');
            $table->integer('payment_method_id')->nullable()->index('payment_method_id');
            $table->integer('member_account_id')->index('member_account_id');
            $table->string('full_name', 64);
            $table->string('company', 32)->nullable();
            $table->string('first_line', 64);
            $table->string('second_line', 64);
            $table->string('third_line', 64)->nullable();
            $table->string('fourth_line', 64)->nullable();
            $table->string('postcode', 10);
            $table->string('zone', 32)->nullable();
            $table->string('country', 64)->nullable();
            $table->decimal('amount', 10)->nullable();
            $table->string('card_type', 16)->nullable();
            $table->integer('threeds_enrolled_transaction_id')->nullable()->index('threeds_enrolled_transaction_id');
            $table->integer('threeds_sig_transaction_id')->nullable()->index('threeds_sig_transaction_id');
            $table->integer('paypal_init_transaction_id')->nullable()->index('paypal_init_transaction_id');
            $table->integer('paypal_get_details_transaction_id')->nullable()->index('paypal_get_details_transaction_id');
            $table->integer('preauth_transaction_id')->nullable()->index('preauth_transaction_id');
            $table->integer('fulfil_transaction_id')->nullable()->index('fulfil_transaction_id');
            $table->integer('gocardless_confirm_transaction_id')->nullable()->index('gocardless_confirm_transaction_id');
            $table->integer('gocardless_init_transaction_id')->nullable()->index('gocardless_init_transaction_id');
            $table->integer('refund_transaction_id')->nullable()->index('refund_transaction_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
};
