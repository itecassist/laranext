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
        Schema::create('customer_order', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_id')->nullable()->index('customer_order_FI_1');
            $table->string('email', 96)->default('');
            $table->string('payment_method', 64)->default('');
            $table->dateTime('last_modified')->nullable();
            $table->dateTime('date_purchased')->nullable()->index('date_purchased');
            $table->integer('order_status_id')->default(0)->index('customer_order_FI_2');
            $table->dateTime('date_finished')->nullable();
            $table->mediumText('comments')->nullable();
            $table->integer('currency_id')->index('customer_order_FI_4');
            $table->char('currency_code', 3)->nullable();
            $table->decimal('currency_value', 14, 6)->nullable();
            $table->integer('site_visit_id')->nullable()->index('customer_order_FI_5');
            $table->integer('original_order_id')->nullable()->index('customer_order_FI_3');
            $table->string('psp_order_id', 32)->nullable();
            $table->integer('organisation_id')->index('customer_order_FI_6');
            $table->integer('member_account_id')->index('member_account_id');
            $table->integer('creating_member_id')->nullable()->index('customer_order_FI_7');
            $table->boolean('moto_order')->nullable();
            $table->string('creating_member_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_order');
    }
};
