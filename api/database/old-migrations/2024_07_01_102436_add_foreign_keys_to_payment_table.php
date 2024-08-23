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
        Schema::table('payment', function (Blueprint $table) {
            $table->foreign(['fulfil_transaction_id'], 'payment_fulfil_transaction_id')->references(['id'])->on('psp_transaction')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['gocardless_confirm_transaction_id'], 'payment_gocardless_confirm_transaction_id')->references(['id'])->on('psp_transaction')->onUpdate('SET NULL')->onDelete('NO ACTION');
            $table->foreign(['gocardless_init_transaction_id'], 'payment_gocardless_init_transaction_id')->references(['id'])->on('psp_transaction')->onUpdate('SET NULL')->onDelete('NO ACTION');
            $table->foreign(['member_account_id'], 'payment_member_account_id')->references(['id'])->on('member_account')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['order_id'], 'payment_order_id')->references(['id'])->on('customer_order')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['organisation_payment_method_id'], 'payment_organisation_payment_method_id')->references(['id'])->on('organisation_payment_method')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['payment_method_id'], 'payment_payment_method_id')->references(['id'])->on('payment_method')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['paypal_get_details_transaction_id'], 'payment_paypal_get_details_transaction_id')->references(['id'])->on('psp_transaction')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['paypal_init_transaction_id'], 'payment_paypal_init_transaction_id')->references(['id'])->on('psp_transaction')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['preauth_transaction_id'], 'payment_preauth_transaction_id')->references(['id'])->on('psp_transaction')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['refund_transaction_id'], 'payment_refund_transaction_id')->references(['id'])->on('psp_transaction')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['threeds_enrolled_transaction_id'], 'payment_threeds_enrolled_transaction_id')->references(['id'])->on('psp_transaction')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['threeds_sig_transaction_id'], 'payment_threeds_sig_transaction_id')->references(['id'])->on('psp_transaction')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment', function (Blueprint $table) {
            $table->dropForeign('payment_fulfil_transaction_id');
            $table->dropForeign('payment_gocardless_confirm_transaction_id');
            $table->dropForeign('payment_gocardless_init_transaction_id');
            $table->dropForeign('payment_member_account_id');
            $table->dropForeign('payment_order_id');
            $table->dropForeign('payment_organisation_payment_method_id');
            $table->dropForeign('payment_payment_method_id');
            $table->dropForeign('payment_paypal_get_details_transaction_id');
            $table->dropForeign('payment_paypal_init_transaction_id');
            $table->dropForeign('payment_preauth_transaction_id');
            $table->dropForeign('payment_refund_transaction_id');
            $table->dropForeign('payment_threeds_enrolled_transaction_id');
            $table->dropForeign('payment_threeds_sig_transaction_id');
        });
    }
};
