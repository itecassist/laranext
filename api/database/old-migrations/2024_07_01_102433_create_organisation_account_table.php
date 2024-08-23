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
        Schema::create('organisation_account', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('organisation_id')->nullable()->unique('organisation_id');
            $table->string('seo_name', 64)->default('')->index('seo_name');
            $table->string('xero_id', 40)->nullable();
            $table->string('name');
            $table->boolean('renew')->default(true);
            $table->decimal('tax_rate', 10, 6)->default(0.2);
            $table->text('comments')->nullable();
            $table->boolean('suppress_embed_todos')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_account');
    }
};
