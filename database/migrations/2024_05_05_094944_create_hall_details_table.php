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
        Schema::create('hall_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hall_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('men_size')->nullable();
            $table->string('women_size')->nullable();
            $table->string('dining_room_size')->nullable();
            $table->string('hall_count')->nullable();
            $table->tinyInteger('separating_halls')->nullable();
            $table->tinyInteger('separate_dining_hall')->nullable();
            $table->tinyInteger('men_council')->nullable();
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
            $table->tinyInteger('click')->nullable();
            $table->tinyInteger('wedding_cake')->nullable();
            $table->tinyInteger('female_workers')->nullable();
            $table->tinyInteger('subs_directs')->nullable();
            $table->tinyInteger('coffee_men')->nullable();
            $table->tinyInteger('security_guard')->nullable();
            $table->tinyInteger('buffet_company')->nullable();
            $table->tinyInteger('holding_several_parties_at_the_same_time')->nullable();
            $table->tinyInteger('car_parking')->nullable();
            $table->tinyInteger('entry_children')->nullable();
            $table->tinyInteger('kosha_and_hall_coordination')->nullable();
            $table->tinyInteger('dj')->nullable();
            $table->tinyInteger('bride_room')->nullable();
            $table->tinyInteger('vip_room')->nullable();
            $table->tinyInteger('food_buffet')->nullable();
            $table->tinyInteger('the_price_is_lower_when_booking_the_women_hall_only')->nullable();
            $table->tinyInteger('the_price_includes_dinner')->nullable();
            $table->tinyInteger('does_the_price_differ_when_booking_on_holidays_and_weekend')->nullable();
            $table->tinyInteger('reservations_are_not_made_without_dinner')->nullable();
            $table->string('what_is_the_minimum_number_to_reserve_the_hall')->nullable();
            $table->string('what_time_does_the_hall_close')->nullable();
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
        Schema::dropIfExists('hall_details');
    }
};
