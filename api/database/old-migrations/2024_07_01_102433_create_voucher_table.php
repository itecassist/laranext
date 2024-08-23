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
        Schema::create('voucher', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('voucher_blueprint_id')->index('voucher_FI_1');
            $table->integer('member_id')->nullable()->index('voucher_FI_2');
            $table->string('code', 64)->nullable()->unique('code');
            $table->dateTime('time_of_issue');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('reminder_sent');
            $table->boolean('redeemed');
            $table->float('amount_redeemed', 10, 0);
            $table->float('shipping_amount_redeemed', 10, 0);
            $table->dateTime('time_of_redemption');
            $table->integer('order_id')->nullable()->index('voucher_FI_3');
            $table->boolean('registered')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voucher');
    }
};
