<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->morphs('addressable');
            $table->string('category')->nullable();
            $table->string('label');
            $table->string('house_number')->nullable();
            $table->string('building')->nullable();
            $table->string('street');
            $table->string('district')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('country_name');
            $table->char('country_code', 3);
            $table->string('postal_code', 10);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
