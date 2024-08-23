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
        Schema::create('event', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('custom_ticket_pdf_suffix', 10)->default('');
            $table->boolean('send_tickets')->default(true);
            $table->text('ticket_message')->nullable();
            $table->integer('next_event_id')->nullable()->index('next_event_id');
            $table->string('step_1_label', 32)->default('Select date');
            $table->string('step_2_label', 32)->default('Select type');
            $table->boolean('hide_date_column')->default(false);
            $table->string('date_column_label', 32)->default('Date');
            $table->string('capacity_column_label', 32)->default('Places available');
            $table->string('book_places_column_label', 32)->default('Book places');
            $table->string('quantity_label', 32)->default('Number of tickets');
            $table->string('location')->nullable();
            $table->string('image', 24)->nullable();
            $table->boolean('published')->default(true);
            $table->boolean('is_public')->default(true);
            $table->boolean('hidden')->default(false);
            $table->boolean('open')->default(false);
            $table->boolean('admin_can_purchase_outside_date_range')->default(false);
            $table->boolean('show_purchases_publicly')->default(false);
            $table->boolean('show_purchases_full_page')->default(false);
            $table->boolean('sort_bookings_by_public_form_fields')->default(false);
            $table->boolean('show_quantity_box')->default(true);
            $table->integer('accounting_group_id')->nullable()->index('event_FI_3');
            $table->string('seo_name')->nullable();
            $table->integer('email_contact_id')->nullable()->index('event_FI_4');
            $table->integer('virtual_table_id')->nullable()->index('event_FI_5');
            $table->boolean('group_products_for_form_filling')->default(true);

            $table->unique(['organisation_id', 'seo_name'], 'organisation_id');
            $table->unique(['organisation_id', 'next_event_id'], 'organisation_id_next_event_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
};
