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
        Schema::create('financial_activity', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_account_id')->index('member_account_id');
            $table->integer('discriminator')->nullable();
            $table->integer('order_lineitem_id')->nullable();
            $table->integer('payment_id')->nullable();
            $table->integer('order_status_history_id')->nullable()->index('order_status_history_id');
            $table->decimal('amount_with_tax', 15)->nullable();
            $table->decimal('amount_without_tax', 15)->nullable();
            $table->dateTime('time');

            $table->unique(['order_lineitem_id', 'order_status_history_id'], 'order_lineitem_id_order_status_history_id');
            $table->unique(['payment_id', 'order_status_history_id'], 'payment_id_order_status_history_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_activity');
    }
};
