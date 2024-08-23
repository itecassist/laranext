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
        Schema::table('auth_permission', function (Blueprint $table) {
            $table->foreign(['role_id'], 'auth_permission_FK_1')->references(['id'])->on('role')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auth_permission', function (Blueprint $table) {
            $table->dropForeign('auth_permission_FK_1');
        });
    }
};
