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
        Schema::create('psp_transaction', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator')->nullable();
            $table->integer('payment_id')->nullable()->index('psp_transaction_FI_1');
            $table->string('request_merchant_reference', 64)->nullable();
            $table->string('request_amount', 64)->nullable();
            $table->char('request_currency', 3)->nullable();
            $table->string('request_address')->nullable();
            $table->string('request_postcode', 10)->nullable();
            $table->string('request_method', 50)->nullable();
            $table->string('request_psp_reference', 64)->nullable();
            $table->string('request_related_merchant_reference', 64)->nullable();
            $table->string('request_authcode', 32)->nullable();
            $table->string('request_tx_auth_no', 16)->nullable();
            $table->dateTime('request_dd_due_date')->nullable();
            $table->dateTime('request_time')->nullable();
            $table->integer('response_status')->nullable();
            $table->string('response_reason', 64)->nullable();
            $table->string('response_psp_reference', 64)->nullable()->index('response_psp_reference');
            $table->string('response_authcode', 32)->nullable();
            $table->string('response_tx_auth_no', 16)->nullable();
            $table->dateTime('response_time')->nullable();
            $table->string('response_address_result', 16)->nullable();
            $table->string('response_cv2_result', 16)->nullable();
            $table->string('response_postcode_result', 16)->nullable();
            $table->string('response_cv2avs_status', 64)->nullable();
            $table->tinyInteger('response_3ds_eci')->nullable();
            $table->string('response_3ds_status', 1)->nullable();
            $table->string('resource_uri')->nullable();
            $table->string('resource_id')->nullable();
            $table->string('resource_type', 32)->nullable();
            $table->string('state', 32)->nullable();
            $table->integer('request_count')->nullable();
            $table->integer('transaction_time')->nullable();

            $table->unique(['resource_type', 'resource_id'], 'resource_type_resource_id_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('psp_transaction');
    }
};
