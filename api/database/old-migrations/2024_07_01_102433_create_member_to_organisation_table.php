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
        Schema::create('member_to_organisation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('member_id');
            $table->integer('organisation_id')->index('member_to_organisation_FI_2');
            $table->dateTime('time_joined')->nullable();
            $table->dateTime('date_of_last_logon')->nullable();
            $table->boolean('authorised')->default(false);
            $table->string('unique_id', 64)->nullable();
            $table->string('legacy_bank_reference', 8)->nullable()->unique('legacy_bank_reference');
            $table->integer('virtual_record_id')->nullable()->unique('virtual_record_id');
            $table->boolean('does_virtual_record_require_update')->default(false);
            $table->integer('default_go_cardless_preauthorisation_id')->nullable()->index('default_go_cardless_preauthorisation_id');

            $table->unique(['member_id', 'organisation_id'], 'member_and_organisation_unique');
            $table->unique(['organisation_id', 'unique_id'], 'organisation_unqiue_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_to_organisation');
    }
};
