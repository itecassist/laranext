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
        Schema::create('organisation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->string('seo_name', 64)->unique('seo_name');
            $table->string('website')->nullable();
            $table->string('embedded_frame_url')->nullable();
            $table->string('email', 96);
            $table->string('phone', 32)->nullable();
            $table->text('description')->nullable();
            $table->string('logo', 32)->nullable();
            $table->string('colour', 6)->default('cccccc');
            $table->string('link_colour', 6)->default('333333');
            $table->integer('button_style')->default(1);
            $table->boolean('subscriptions_single_column_layout')->default(false);
            $table->boolean('renewal_show_current_subscriptions')->default(true);
            $table->boolean('hidden')->default(false);
            $table->integer('tax_class_id')->index('tax_class_id');
            $table->integer('currency_id')->default(1)->index('currency_id');
            $table->integer('default_address_country_id')->default(222)->index('default_address_country_id');
            $table->integer('csv_output_charset_id')->default(1);
            $table->integer('member_authorisation')->default(0);
            $table->boolean('admins_require_2fa')->default(false);
            $table->integer('max_days_between_2fa')->nullable()->default(30);
            $table->boolean('use_full_page_cart')->default(false);
            $table->boolean('organisation_group_required')->default(false);
            $table->integer('preferred_event_box_tab')->default(0);
            $table->integer('default_payment_method_id')->nullable()->index('default_payment_method_id');
            $table->binary('serialized_blob')->nullable();
            $table->integer('virtual_table_id')->nullable()->index('virtual_table_id');
            $table->dateTime('time_created')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('case_study_published')->default(false);
            $table->string('case_study_image', 16)->nullable();
            $table->boolean('template')->default(false);
            $table->integer('video_id')->nullable()->index('video_id');
            $table->integer('target_sub_sector_id')->nullable()->index('target_sub_sector_id');
            $table->boolean('block_orgadm')->default(false);
            $table->boolean('block_public')->default(false);
            $table->integer('embedded_mode_load_count')->default(0);
            $table->integer('api_load_count')->default(0);
            $table->integer('member_count')->default(0);
            $table->integer('customer_order_count')->default(0);
            $table->dateTime('last_admin_login')->nullable();
            $table->integer('unpaid_paypal_tx_count')->default(0);
            $table->integer('unpaid_sagepay_tx_count')->default(0);
            $table->string('invoicing_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation');
    }
};
