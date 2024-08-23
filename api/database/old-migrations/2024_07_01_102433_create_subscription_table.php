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
        Schema::create('subscription', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_id')->nullable()->index('subscription_FI_1');
            $table->integer('organisation_group_id')->nullable()->index('subscription_FI_4');
            $table->string('membership_number', 64)->nullable();
            $table->integer('organisation_id');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('renew')->default(true);
            $table->integer('variation_id')->index('subscription_FI_3');
            $table->integer('product_id')->index('subscription_FI_5');
            $table->integer('virtual_record_id')->nullable()->unique('virtual_record_id');

            $table->unique(['organisation_id', 'membership_number'], 'membership_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription');
    }
};
