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
        Schema::table('subscription', function (Blueprint $table) {
            $table->foreign(['member_id'], 'subscription_FK_1')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['organisation_id'], 'subscription_FK_2')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['variation_id'], 'subscription_FK_3')->references(['id'])->on('variation')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['organisation_group_id'], 'subscription_FK_4')->references(['id'])->on('organisation_group')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['product_id'], 'subscription_FK_5')->references(['id'])->on('product')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign(['virtual_record_id'], 'subscription_FK_6')->references(['id'])->on('virtual_record')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription', function (Blueprint $table) {
            $table->dropForeign('subscription_FK_1');
            $table->dropForeign('subscription_FK_2');
            $table->dropForeign('subscription_FK_3');
            $table->dropForeign('subscription_FK_4');
            $table->dropForeign('subscription_FK_5');
            $table->dropForeign('subscription_FK_6');
        });
    }
};
