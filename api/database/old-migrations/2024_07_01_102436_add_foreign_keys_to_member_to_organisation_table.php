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
        Schema::table('member_to_organisation', function (Blueprint $table) {
            $table->foreign(['default_go_cardless_preauthorisation_id'], 'member_to_organisation_default_go_cardless_preauthorisation_id')->references(['id'])->on('payment_method')->onUpdate('CASCADE')->onDelete('SET NULL');
            $table->foreign(['member_id'], 'member_to_organisation_FK_1')->references(['id'])->on('member')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['organisation_id'], 'member_to_organisation_FK_2')->references(['id'])->on('organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['virtual_record_id'], 'member_to_organisation_FK_3')->references(['id'])->on('virtual_record')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_to_organisation', function (Blueprint $table) {
            $table->dropForeign('member_to_organisation_default_go_cardless_preauthorisation_id');
            $table->dropForeign('member_to_organisation_FK_1');
            $table->dropForeign('member_to_organisation_FK_2');
            $table->dropForeign('member_to_organisation_FK_3');
        });
    }
};
