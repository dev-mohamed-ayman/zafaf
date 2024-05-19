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
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('address');
            $table->string('country');
            $table->string('visits', 999)->nullable();
            $table->string('coordinates', 999)->nullable();
            $table->string('slide_images', 999)->nullable();
            $table->string('show_phone', 999)->nullable();
            $table->longText('description_ar');
            $table->longText('description_en');
            $table->string('size');
            $table->string('price');
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('type');
            $table->string('order')->default('1');
            $table->string('offer')->default('0');
            $table->tinyInteger('is_popup')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};
