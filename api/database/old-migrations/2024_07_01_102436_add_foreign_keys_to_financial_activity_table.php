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
        Schema::table('financial_activity', function (Blueprint $table) {
            $table->foreign(['member_account_id'], 'financial_activity_member_account_id')->references(['id'])->on('member_account')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['order_lineitem_id'], 'financial_activity_order_lineitem_id')->references(['id'])->on('order_lineitem')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['order_status_history_id'], 'financial_activity_order_status_history_id')->references(['id'])->on('order_status_history')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['payment_id'], 'financial_activity_payment_id')->references(['id'])->on('payment')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financial_activity', function (Blueprint $table) {
            $table->dropForeign('financial_activity_member_account_id');
            $table->dropForeign('financial_activity_order_lineitem_id');
            $table->dropForeign('financial_activity_order_status_history_id');
            $table->dropForeign('financial_activity_payment_id');
        });
    }
};
