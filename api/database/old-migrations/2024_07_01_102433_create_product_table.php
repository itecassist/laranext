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
        Schema::create('product', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('discriminator')->nullable();
            $table->string('name', 128)->nullable();
            $table->text('description')->nullable();
            $table->string('code', 24)->nullable();
            $table->integer('organisation_id')->nullable()->index('product_FI_2');
            $table->integer('inventory')->nullable();
            $table->boolean('published')->default(true);
            $table->integer('capacity')->nullable();
            $table->integer('deleted_tickets')->default(0);
            $table->integer('event_id')->nullable()->index('product_FI_3');
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->date('ticket_end_date')->nullable();
            $table->date('ticket_release_date')->nullable();
            $table->integer('subscription_product_type')->nullable();
            $table->integer('tax_class_id')->index('product_FI_1');
            $table->integer('accounting_group_id')->nullable()->index('product_FI_4');
            $table->integer('subscription_days')->nullable();
            $table->integer('subscription_duration')->nullable();
            $table->integer('end_day')->nullable();
            $table->integer('end_month')->nullable();
            $table->integer('rollover_period')->nullable();
            $table->boolean('pro_rata_pricing')->nullable();
            $table->boolean('show_quantity_box')->default(true);
            $table->boolean('members_only')->nullable();
            $table->integer('virtual_table_id')->nullable()->index('product_FI_6');
            $table->boolean('is_public')->default(true);
            $table->boolean('is_renewable')->default(true);
            $table->boolean('auto_renew')->default(false);
            $table->boolean('auto_renew_silent')->default(false);
            $table->integer('sortable_rank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
