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
        Schema::create('auth_permission', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('module', 127);
            $table->string('controller', 127);
            $table->string('action', 127);
            $table->integer('allow')->default(0);
            $table->integer('role_id')->nullable()->index('auth_permission_FI_1');
            $table->integer('permission_order');

            $table->unique(['module', 'permission_order'], 'order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_permission');
    }
};
