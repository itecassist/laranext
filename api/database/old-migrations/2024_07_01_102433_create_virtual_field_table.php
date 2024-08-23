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
        Schema::create('virtual_field', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('type');
            $table->integer('virtual_table_id');
            $table->string('name', 64)->nullable();
            $table->string('field_name', 64)->nullable();
            $table->text('description')->nullable();
            $table->boolean('required')->default(false);
            $table->boolean('default_boolean_value')->default(false);
            $table->boolean('gdpr_sensitive')->default(false);
            $table->integer('decimal_places')->default(0);
            $table->integer('min_int_value')->nullable();
            $table->integer('max_int_value')->nullable();
            $table->date('min_date_value')->nullable();
            $table->date('max_date_value')->nullable();
            $table->boolean('in_summary')->default(false);
            $table->boolean('displayable_publicly')->default(false);
            $table->boolean('viewable_by_member')->default(true);
            $table->boolean('editable_by_member')->default(true);
            $table->boolean('show_tag')->default(true);
            $table->integer('multi_radio_option_enum_value_id')->nullable()->unique('multi_radio_option_enum_value_id');
            $table->integer('tree_left')->nullable();
            $table->integer('tree_right')->nullable();
            $table->integer('tree_level')->nullable();

            $table->unique(['virtual_table_id', 'field_name'], 'field_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virtual_field');
    }
};
