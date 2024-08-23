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
        Schema::create('order_lineitem', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('order_id')->default(0);
            $table->integer('discriminator')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('variation_id')->nullable()->index('order_lineitem_FI_3');
            $table->integer('virtual_record_id')->nullable()->unique('virtual_record_id');
            $table->integer('original_order_lineitem_id')->nullable()->unique('original_order_lineitem_id');
            $table->integer('shipment_id')->nullable()->index('order_lineitem_FI_5');
            $table->integer('voucher_id')->nullable()->index('order_lineitem_FI_6');
            $table->integer('subscription_id')->nullable()->index('order_lineitem_FI_8');
            $table->integer('member_id')->nullable()->index('order_lineitem_FI_9');
            $table->string('description')->default('');
            $table->decimal('tax_rate', 7, 4)->default(0);
            $table->decimal('original_value_without_tax', 15)->nullable();
            $table->decimal('original_value_with_tax', 15)->nullable();
            $table->decimal('value_without_tax', 15)->default(0);
            $table->decimal('value_with_tax', 15)->default(0);
            $table->decimal('converted_value_without_tax', 15)->default(0);
            $table->decimal('converted_value_with_tax', 15)->default(0);
            $table->string('accounting_group_code', 16)->nullable();
            $table->string('accounting_group_description', 64)->nullable();
            $table->integer('ticket_id')->nullable()->index('order_lineitem_FI_10');

            $table->index(['order_id', 'product_id'], 'order_id_product_id');
            $table->index(['product_id', 'order_id'], 'product_id_order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_lineitem');
    }
};
