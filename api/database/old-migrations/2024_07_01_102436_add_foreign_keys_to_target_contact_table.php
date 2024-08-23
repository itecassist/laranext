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
        Schema::table('target_contact', function (Blueprint $table) {
            $table->foreign(['target_organisation_id'], 'target_contact_FK_1')->references(['id'])->on('target_organisation')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_contact', function (Blueprint $table) {
            $table->dropForeign('target_contact_FK_1');
        });
    }
};
