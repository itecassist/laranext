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
        Schema::create('payment_method', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator');
            $table->integer('member_id')->index('payment_method_FI_1');
            $table->integer('organisation_id')->nullable()->index('organisation_id');
            $table->integer('cardholder_address_id')->nullable()->index('payment_method_FI_2');
            $table->string('pay_pal_recurring_profile_id', 32)->nullable();
            $table->string('go_cardless_pre_authorisation_id')->nullable();
            $table->string('go_cardless_user_id')->nullable();
            $table->string('go_cardless_merchant_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_method');
    }
};
