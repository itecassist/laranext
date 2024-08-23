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
        Schema::create('seo_site', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('domain', 50)->unique('domain');
            $table->string('google_host', 50);
            $table->string('additional_google_params')->nullable();
            $table->integer('update_frequency');
            $table->date('last_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_site');
    }
};
