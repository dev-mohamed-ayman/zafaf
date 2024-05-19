<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotel_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hall_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('stars')->nullable();
            $table->string('hall_count')->nullable();
            $table->string('dining_hall')->nullable();
            $table->string('room_count')->nullable();
            $table->tinyInteger('free_suite')->nullable();
            $table->tinyInteger('sacrifices')->nullable();
            $table->tinyInteger('hot_cold_drinks')->nullable();
            $table->tinyInteger('lights')->nullable();
            $table->tinyInteger('photography_and_video')->nullable();
            $table->tinyInteger('separate_entrance')->nullable();
            $table->tinyInteger('staircase_wedding')->nullable();
            $table->tinyInteger('phone_inspector')->nullable();
            $table->tinyInteger('abayas_official')->nullable();
            $table->tinyInteger('hall_supervisor')->nullable();
            $table->tinyInteger('wedding_cake')->nullable();
            $table->tinyInteger('female_workers')->nullable();
            $table->tinyInteger('subs_directs')->nullable();
            $table->tinyInteger('coffee_men')->nullable();
            $table->tinyInteger('buffet_company')->nullable();
            $table->tinyInteger('holding_several_parties_at_the_same_time')->nullable();
            $table->tinyInteger('car_parking')->nullable();
            $table->tinyInteger('kosha_and_hall_coordination')->nullable();
            $table->tinyInteger('dj')->nullable();
            $table->tinyInteger('bride_room')->nullable();
            $table->tinyInteger('food_buffet')->nullable();
            $table->tinyInteger('possibility_of_holding_men_wedding')->nullable();
            $table->tinyInteger('possibility_of_separating_halls')->nullable();
            $table->tinyInteger('separate_dining_hall')->nullable();
            $table->tinyInteger('external_hall')->nullable();
            $table->tinyInteger('price_includes_dinner')->nullable();
            $table->tinyInteger('allow_food_from_outside')->nullable();
            $table->string('what_is_the_minimum_number_to_reserve_the_hall')->nullable();
            $table->string('what_time_does_the_hall_close')->nullable();
            $table->string('what_events_can_be_hosted')->nullable();
            $table->tinyInteger('observe_social_distancing_measures')->nullable();
            $table->tinyInteger('wide_space_between_tables')->nullable();
            $table->tinyInteger('complete_cleanse_before_every_event')->nullable();
            $table->tinyInteger('hand_sanitizer_in_specific_places')->nullable();
            $table->tinyInteger('sterile_wipes_for_each_table')->nullable();
            $table->tinyInteger('regular_ventilation_of_the_hall')->nullable();
            $table->tinyInteger('hospitality_in_special_and_closed_boxes')->nullable();
            $table->tinyInteger('disposable_eating_utensils')->nullable();
            $table->tinyInteger('providing_the_service_staff_with_gloves_and_masks')->nullable();
            $table->tinyInteger('temperature_measuring_devices_at_the_entrance')->nullable();
            $table->tinyInteger('sensor_operated_faucets')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_details');
    }
};
