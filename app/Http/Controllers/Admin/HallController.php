<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hall;
use App\Models\HallDetails;
use App\Models\HallEdit;
use App\Models\HotelDetails;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HallRequest;
use App\Models\City;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Hall::query()->orderBy('id', 'desc')->paginate(15);
        return view('admin.hall.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('admin.hall.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HallRequest $request)
    {
        DB::beginTransaction();
        try {

            $data = $request->except('images', '_token', 'orders', 'ipinfo', 'hall', 'hotel');
            $data['user_id'] = auth()->user()->id;
            $data['country'] = City::query()->where('id', $request->city_id)->first()->country;


            $hall = Hall::query()->create($data);


            if ($request->images) {
                foreach ($request->images as $index => $file) {
                    $image = new Image();
                    $image->path = uploadFile('uploads/halls', $file);
                    $image->hall_id = $hall->id;
                    $image->order = $request->orders[$index];
                    $image->save();
                }
            }


            if ($request->type == 'halls') {
                $hallDetails = new HallDetails();
                $hallDetails->hall_id = $hall->id;
                $hallDetails->men_size = !empty($request->hall['men_size']) ? $request->hall['men_size'] : null;
                $hallDetails->women_size = !empty($request->hall['women_size']) ? $request->hall['women_size'] : null;
                $hallDetails->dining_room_size = !empty($request->hall['dining_room_size']) ? $request->hall['dining_room_size'] : null;
                $hallDetails->hall_count = !empty($request->hall['hall_count']) ? $request->hall['hall_count'] : null;
                $hallDetails->separating_halls = !empty($request->hall['separating_halls']) ? $request->hall['separating_halls'] : null;
                $hallDetails->separate_dining_hall = !empty($request->hall['separate_dining_hall']) ? $request->hall['separate_dining_hall'] : null;
                $hallDetails->men_council = !empty($request->hall['men_council']) ? $request->hall['men_council'] : null;
                $hallDetails->free_suite = !empty($request->hall['free_suite']) ? $request->hall['free_suite'] : null;
                $hallDetails->sacrifices = !empty($request->hall['sacrifices']) ? $request->hall['sacrifices'] : null;
                $hallDetails->hot_cold_drinks = !empty($request->hall['hot_cold_drinks']) ? $request->hall['hot_cold_drinks'] : null;
                $hallDetails->lights = !empty($request->hall['lights']) ? $request->hall['lights'] : null;
                $hallDetails->photography_and_video = !empty($request->hall['photography_and_video']) ? $request->hall['photography_and_video'] : null;
                $hallDetails->separate_entrance = !empty($request->hall['separate_entrance']) ? $request->hall['separate_entrance'] : null;
                $hallDetails->staircase_wedding = !empty($request->hall['staircase_wedding']) ? $request->hall['staircase_wedding'] : null;
                $hallDetails->phone_inspector = !empty($request->hall['phone_inspector']) ? $request->hall['phone_inspector'] : null;
                $hallDetails->abayas_official = !empty($request->hall['abayas_official']) ? $request->hall['abayas_official'] : null;
                $hallDetails->hall_supervisor = !empty($request->hall['hall_supervisor']) ? $request->hall['hall_supervisor'] : null;
                $hallDetails->click = !empty($request->hall['click']) ? $request->hall['click'] : null;
                $hallDetails->wedding_cake = !empty($request->hall['wedding_cake']) ? $request->hall['wedding_cake'] : null;
                $hallDetails->female_workers = !empty($request->hall['female_workers']) ? $request->hall['female_workers'] : null;
                $hallDetails->subs_directs = !empty($request->hall['subs_directs']) ? $request->hall['subs_directs'] : null;
                $hallDetails->coffee_men = !empty($request->hall['coffee_men']) ? $request->hall['coffee_men'] : null;
                $hallDetails->security_guard = !empty($request->hall['security_guard']) ? $request->hall['security_guard'] : null;
                $hallDetails->buffet_company = !empty($request->hall['buffet_company']) ? $request->hall['buffet_company'] : null;
                $hallDetails->holding_several_parties_at_the_same_time = !empty($request->hall['holding_several_parties_at_the_same_time']) ? $request->hall['holding_several_parties_at_the_same_time'] : null;
                $hallDetails->car_parking = !empty($request->hall['car_parking']) ? $request->hall['car_parking'] : null;
                $hallDetails->entry_children = !empty($request->hall['entry_children']) ? $request->hall['entry_children'] : null;
                $hallDetails->kosha_and_hall_coordination = !empty($request->hall['kosha_and_hall_coordination']) ? $request->hall['kosha_and_hall_coordination'] : null;
                $hallDetails->dj = !empty($request->hall['dj']) ? $request->hall['dj'] : null;
                $hallDetails->bride_room = !empty($request->hall['bride_room']) ? $request->hall['bride_room'] : null;
                $hallDetails->vip_room = !empty($request->hall['vip_room']) ? $request->hall['vip_room'] : null;
                $hallDetails->food_buffet = !empty($request->hall['food_buffet']) ? $request->hall['food_buffet'] : null;
                $hallDetails->the_price_is_lower_when_booking_the_women_hall_only = !empty($request->hall['the_price_is_lower_when_booking_the_women_hall_only']) ? $request->hall['the_price_is_lower_when_booking_the_women_hall_only'] : null;
                $hallDetails->the_price_includes_dinner = !empty($request->hall['the_price_includes_dinner']) ? $request->hall['the_price_includes_dinner'] : null;
                $hallDetails->does_the_price_differ_when_booking_on_holidays_and_weekend = !empty($request->hall['does_the_price_differ_when_booking_on_holidays_and_weekend']) ? $request->hall['does_the_price_differ_when_booking_on_holidays_and_weekend'] : null;
                $hallDetails->reservations_are_not_made_without_dinner = !empty($request->hall['reservations_are_not_made_without_dinner']) ? $request->hall['reservations_are_not_made_without_dinner'] : null;
                $hallDetails->what_is_the_minimum_number_to_reserve_the_hall = !empty($request->hall['what_is_the_minimum_number_to_reserve_the_hall']) ? $request->hall['what_is_the_minimum_number_to_reserve_the_hall'] : null;
                $hallDetails->what_time_does_the_hall_close = !empty($request->hall['what_time_does_the_hall_close']) ? $request->hall['what_time_does_the_hall_close'] : null;
                $hallDetails->observe_social_distancing_measures = !empty($request->hall['observe_social_distancing_measures']) ? $request->hall['observe_social_distancing_measures'] : null;
                $hallDetails->wide_space_between_tables = !empty($request->hall['wide_space_between_tables']) ? $request->hall['wide_space_between_tables'] : null;
                $hallDetails->complete_cleanse_before_every_event = !empty($request->hall['complete_cleanse_before_every_event']) ? $request->hall['complete_cleanse_before_every_event'] : null;
                $hallDetails->hand_sanitizer_in_specific_places = !empty($request->hall['hand_sanitizer_in_specific_places']) ? $request->hall['hand_sanitizer_in_specific_places'] : null;
                $hallDetails->sterile_wipes_for_each_table = !empty($request->hall['sterile_wipes_for_each_table']) ? $request->hall['sterile_wipes_for_each_table'] : null;
                $hallDetails->regular_ventilation_of_the_hall = !empty($request->hall['regular_ventilation_of_the_hall']) ? $request->hall['regular_ventilation_of_the_hall'] : null;
                $hallDetails->hospitality_in_special_and_closed_boxes = !empty($request->hall['hospitality_in_special_and_closed_boxes']) ? $request->hall['hospitality_in_special_and_closed_boxes'] : null;
                $hallDetails->disposable_eating_utensils = !empty($request->hall['disposable_eating_utensils']) ? $request->hall['disposable_eating_utensils'] : null;
                $hallDetails->providing_the_service_staff_with_gloves_and_masks = !empty($request->hall['providing_the_service_staff_with_gloves_and_masks']) ? $request->hall['providing_the_service_staff_with_gloves_and_masks'] : null;
                $hallDetails->temperature_measuring_devices_at_the_entrance = !empty($request->hall['temperature_measuring_devices_at_the_entrance']) ? $request->hall['temperature_measuring_devices_at_the_entrance'] : null;
                $hallDetails->sensor_operated_faucets = !empty($request->hall['sensor_operated_faucets']) ? $request->hall['sensor_operated_faucets'] : null;
                $hallDetails->save();
            } else {
                $hotelDetails = new HotelDetails();
                $hotelDetails->hall_id = $hall->id;
                $hotelDetails->stars = !empty($request->hotel['stars']) ? $request->hotel['stars'] : null;
                $hotelDetails->hall_count = !empty($request->hotel['hall_count']) ? $request->hotel['hall_count'] : null;
                $hotelDetails->dining_hall = !empty($request->hotel['dining_hall']) ? $request->hotel['dining_hall'] : null;
                $hotelDetails->room_count = !empty($request->hotel['room_count']) ? $request->hotel['room_count'] : null;
                $hotelDetails->free_suite = !empty($request->hotel['free_suite']) ? $request->hotel['free_suite'] : null;
                $hotelDetails->sacrifices = !empty($request->hotel['sacrifices']) ? $request->hotel['sacrifices'] : null;
                $hotelDetails->hot_cold_drinks = !empty($request->hotel['hot_cold_drinks']) ? $request->hotel['hot_cold_drinks'] : null;
                $hotelDetails->lights = !empty($request->hotel['lights']) ? $request->hotel['lights'] : null;
                $hotelDetails->photography_and_video = !empty($request->hotel['photography_and_video']) ? $request->hotel['photography_and_video'] : null;
                $hotelDetails->separate_entrance = !empty($request->hotel['separate_entrance']) ? $request->hotel['separate_entrance'] : null;
                $hotelDetails->staircase_wedding = !empty($request->hotel['staircase_wedding']) ? $request->hotel['staircase_wedding'] : null;
                $hotelDetails->phone_inspector = !empty($request->hotel['phone_inspector']) ? $request->hotel['phone_inspector'] : null;
                $hotelDetails->abayas_official = !empty($request->hotel['abayas_official']) ? $request->hotel['abayas_official'] : null;
                $hotelDetails->hall_supervisor = !empty($request->hotel['hall_supervisor']) ? $request->hotel['hall_supervisor'] : null;
                $hotelDetails->wedding_cake = !empty($request->hotel['wedding_cake']) ? $request->hotel['wedding_cake'] : null;
                $hotelDetails->female_workers = !empty($request->hotel['female_workers']) ? $request->hotel['female_workers'] : null;
                $hotelDetails->subs_directs = !empty($request->hotel['subs_directs']) ? $request->hotel['subs_directs'] : null;
                $hotelDetails->coffee_men = !empty($request->hotel['coffee_men']) ? $request->hotel['coffee_men'] : null;
                $hotelDetails->buffet_company = !empty($request->hotel['buffet_company']) ? $request->hotel['buffet_company'] : null;
                $hotelDetails->holding_several_parties_at_the_same_time = !empty($request->hotel['holding_several_parties_at_the_same_time']) ? $request->hotel['holding_several_parties_at_the_same_time'] : null;
                $hotelDetails->car_parking = !empty($request->hotel['car_parking']) ? $request->hotel['car_parking'] : null;
                $hotelDetails->kosha_and_hall_coordination = !empty($request->hotel['kosha_and_hall_coordination']) ? $request->hotel['kosha_and_hall_coordination'] : null;
                $hotelDetails->dj = !empty($request->hotel['dj']) ? $request->hotel['dj'] : null;
                $hotelDetails->bride_room = !empty($request->hotel['bride_room']) ? $request->hotel['bride_room'] : null;
                $hotelDetails->food_buffet = !empty($request->hotel['food_buffet']) ? $request->hotel['food_buffet'] : null;
                $hotelDetails->possibility_of_holding_men_wedding = !empty($request->hotel['possibility_of_holding_men_wedding']) ? $request->hotel['possibility_of_holding_men_wedding'] : null;
                $hotelDetails->possibility_of_separating_halls = !empty($request->hotel['possibility_of_separating_halls']) ? $request->hotel['possibility_of_separating_halls'] : null;
                $hotelDetails->separate_dining_hall = !empty($request->hotel['separate_dining_hall']) ? $request->hotel['separate_dining_hall'] : null;
                $hotelDetails->external_hall = !empty($request->hotel['external_hall']) ? $request->hotel['external_hall'] : null;
                $hotelDetails->price_includes_dinner = !empty($request->hotel['price_includes_dinner']) ? $request->hotel['price_includes_dinner'] : null;
                $hotelDetails->allow_food_from_outside = !empty($request->hotel['allow_food_from_outside']) ? $request->hotel['allow_food_from_outside'] : null;
                $hotelDetails->what_is_the_minimum_number_to_reserve_the_hall = !empty($request->hotel['what_is_the_minimum_number_to_reserve_the_hall']) ? $request->hotel['what_is_the_minimum_number_to_reserve_the_hall'] : null;
                $hotelDetails->what_time_does_the_hall_close = !empty($request->hotel['what_time_does_the_hall_close']) ? $request->hotel['what_time_does_the_hall_close'] : null;
                $hotelDetails->what_events_can_be_hosted = !empty($request->hotel['what_events_can_be_hosted']) ? $request->hotel['what_events_can_be_hosted'] : null;
                $hotelDetails->observe_social_distancing_measures = !empty($request->hotel['observe_social_distancing_measures']) ? $request->hotel['observe_social_distancing_measures'] : null;
                $hotelDetails->wide_space_between_tables = !empty($request->hotel['wide_space_between_tables']) ? $request->hotel['wide_space_between_tables'] : null;
                $hotelDetails->complete_cleanse_before_every_event = !empty($request->hotel['complete_cleanse_before_every_event']) ? $request->hotel['complete_cleanse_before_every_event'] : null;
                $hotelDetails->hand_sanitizer_in_specific_places = !empty($request->hotel['hand_sanitizer_in_specific_places']) ? $request->hotel['hand_sanitizer_in_specific_places'] : null;
                $hotelDetails->sterile_wipes_for_each_table = !empty($request->hotel['sterile_wipes_for_each_table']) ? $request->hotel['sterile_wipes_for_each_table'] : null;
                $hotelDetails->regular_ventilation_of_the_hall = !empty($request->hotel['regular_ventilation_of_the_hall']) ? $request->hotel['regular_ventilation_of_the_hall'] : null;
                $hotelDetails->hospitality_in_special_and_closed_boxes = !empty($request->hotel['hospitality_in_special_and_closed_boxes']) ? $request->hotel['hospitality_in_special_and_closed_boxes'] : null;
                $hotelDetails->disposable_eating_utensils = !empty($request->hotel['disposable_eating_utensils']) ? $request->hotel['disposable_eating_utensils'] : null;
                $hotelDetails->providing_the_service_staff_with_gloves_and_masks = !empty($request->hotel['providing_the_service_staff_with_gloves_and_masks']) ? $request->hotel['providing_the_service_staff_with_gloves_and_masks'] : null;
                $hotelDetails->temperature_measuring_devices_at_the_entrance = !empty($request->hotel['temperature_measuring_devices_at_the_entrance']) ? $request->hotel['temperature_measuring_devices_at_the_entrance'] : null;
                $hotelDetails->sensor_operated_faucets = !empty($request->hotel['sensor_operated_faucets']) ? $request->hotel['sensor_operated_faucets'] : null;
                $hotelDetails->save();
            }


            DB::commit();
            return redirect()->route('admin.hall.index')->with('success', 'تم اضافة القاعه بنجاح');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        $items = Order::query()->where('hall_id', $hall->id)->paginate(15);
        return view('admin.order.index', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        $cities = City::all();
        $hallDetails = [];
        $hotelDetails = [];
        if ($hall->type == 'hall') {
            $hallDetails = $hall->hallDetails;
        } else {
            $hotelDetails = $hall->hotelDetails;
        }
//        return $hotelDetails;
        return view('admin.hall.edit', compact('cities', 'hall', 'hotelDetails', 'hallDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hall $hall)
    {
        $actions = [];
        if ($request->name_ar != $hall->name_ar) {
            array_push($actions, 'تم التعديل علي الاسم بالعربي');
        }
        if ($request->name_en != $hall->name_en) {
            array_push($actions, 'تم التعديل علي الاسم بالانجليزي');
        }
        if ($request->description_ar != $hall->description_ar) {
            array_push($actions, 'تم التعديل علي الوصف بالعربي');
        }
        if ($request->description_en != $hall->description_en) {
            array_push($actions, 'تم التعديل علي الوصف بالانجليزي');
        }
        if ($request->address != $hall->address) {
            array_push($actions, 'تم التعديل علي العنوان');
        }
        if ($request->coordinates != $hall->coordinates) {
            array_push($actions, 'تم التعديل علي الاحداثيات');
        }
        if ($request->size != $hall->size) {
            array_push($actions, 'تم التعديل علي السعة');
        }
        if ($request->price != $hall->price) {
            array_push($actions, 'تم التعديل علي السعر');
        }
        if ($request->city_id != $hall->city_id) {
            array_push($actions, 'تم التعديل علي المدينة');
        }
        if ($request->phone != $hall->phone) {
            array_push($actions, 'تم التعديل علي رقم الهاتف');
        }
        if ($request->whatsapp != $hall->whatsapp) {
            array_push($actions, 'تم التعديل علي الواتساب');
        }
        if ($request->type != $hall->type) {
            array_push($actions, 'تم التعديل علي النوع');
        }
        if ($request->order != $hall->order) {
            array_push($actions, 'تم التعديل علي الترتيب');
        }
        if ($request->offer != $hall->offer) {
            array_push($actions, 'تم التعديل علي هل يوجد عروض');
        }


        if ($hall->type == 'halls') {
            $hallDetails = $hall->hallDetails;
            $hallDetails->hall_id = $hall->id;
            $hallDetails->men_size = !empty($request->hall['men_size']) ? $request->hall['men_size'] : null;
            $hallDetails->women_size = !empty($request->hall['women_size']) ? $request->hall['women_size'] : null;
            $hallDetails->dining_room_size = !empty($request->hall['dining_room_size']) ? $request->hall['dining_room_size'] : null;
            $hallDetails->hall_count = !empty($request->hall['hall_count']) ? $request->hall['hall_count'] : null;
            $hallDetails->separating_halls = !empty($request->hall['separating_halls']) ? $request->hall['separating_halls'] : null;
            $hallDetails->separate_dining_hall = !empty($request->hall['separate_dining_hall']) ? $request->hall['separate_dining_hall'] : null;
            $hallDetails->men_council = !empty($request->hall['men_council']) ? $request->hall['men_council'] : null;
            $hallDetails->free_suite = !empty($request->hall['free_suite']) ? $request->hall['free_suite'] : null;
            $hallDetails->sacrifices = !empty($request->hall['sacrifices']) ? $request->hall['sacrifices'] : null;
            $hallDetails->hot_cold_drinks = !empty($request->hall['hot_cold_drinks']) ? $request->hall['hot_cold_drinks'] : null;
            $hallDetails->lights = !empty($request->hall['lights']) ? $request->hall['lights'] : null;
            $hallDetails->photography_and_video = !empty($request->hall['photography_and_video']) ? $request->hall['photography_and_video'] : null;
            $hallDetails->separate_entrance = !empty($request->hall['separate_entrance']) ? $request->hall['separate_entrance'] : null;
            $hallDetails->staircase_wedding = !empty($request->hall['staircase_wedding']) ? $request->hall['staircase_wedding'] : null;
            $hallDetails->phone_inspector = !empty($request->hall['phone_inspector']) ? $request->hall['phone_inspector'] : null;
            $hallDetails->abayas_official = !empty($request->hall['abayas_official']) ? $request->hall['abayas_official'] : null;
            $hallDetails->hall_supervisor = !empty($request->hall['hall_supervisor']) ? $request->hall['hall_supervisor'] : null;
            $hallDetails->click = !empty($request->hall['click']) ? $request->hall['click'] : null;
            $hallDetails->wedding_cake = !empty($request->hall['wedding_cake']) ? $request->hall['wedding_cake'] : null;
            $hallDetails->female_workers = !empty($request->hall['female_workers']) ? $request->hall['female_workers'] : null;
            $hallDetails->subs_directs = !empty($request->hall['subs_directs']) ? $request->hall['subs_directs'] : null;
            $hallDetails->coffee_men = !empty($request->hall['coffee_men']) ? $request->hall['coffee_men'] : null;
            $hallDetails->security_guard = !empty($request->hall['security_guard']) ? $request->hall['security_guard'] : null;
            $hallDetails->buffet_company = !empty($request->hall['buffet_company']) ? $request->hall['buffet_company'] : null;
            $hallDetails->holding_several_parties_at_the_same_time = !empty($request->hall['holding_several_parties_at_the_same_time']) ? $request->hall['holding_several_parties_at_the_same_time'] : null;
            $hallDetails->car_parking = !empty($request->hall['car_parking']) ? $request->hall['car_parking'] : null;
            $hallDetails->entry_children = !empty($request->hall['entry_children']) ? $request->hall['entry_children'] : null;
            $hallDetails->kosha_and_hall_coordination = !empty($request->hall['kosha_and_hall_coordination']) ? $request->hall['kosha_and_hall_coordination'] : null;
            $hallDetails->dj = !empty($request->hall['dj']) ? $request->hall['dj'] : null;
            $hallDetails->bride_room = !empty($request->hall['bride_room']) ? $request->hall['bride_room'] : null;
            $hallDetails->vip_room = !empty($request->hall['vip_room']) ? $request->hall['vip_room'] : null;
            $hallDetails->food_buffet = !empty($request->hall['food_buffet']) ? $request->hall['food_buffet'] : null;
            $hallDetails->the_price_is_lower_when_booking_the_women_hall_only = !empty($request->hall['the_price_is_lower_when_booking_the_women_hall_only']) ? $request->hall['the_price_is_lower_when_booking_the_women_hall_only'] : null;
            $hallDetails->the_price_includes_dinner = !empty($request->hall['the_price_includes_dinner']) ? $request->hall['the_price_includes_dinner'] : null;
            $hallDetails->does_the_price_differ_when_booking_on_holidays_and_weekend = !empty($request->hall['does_the_price_differ_when_booking_on_holidays_and_weekend']) ? $request->hall['does_the_price_differ_when_booking_on_holidays_and_weekend'] : null;
            $hallDetails->reservations_are_not_made_without_dinner = !empty($request->hall['reservations_are_not_made_without_dinner']) ? $request->hall['reservations_are_not_made_without_dinner'] : null;
            $hallDetails->what_is_the_minimum_number_to_reserve_the_hall = !empty($request->hall['what_is_the_minimum_number_to_reserve_the_hall']) ? $request->hall['what_is_the_minimum_number_to_reserve_the_hall'] : null;
            $hallDetails->what_time_does_the_hall_close = !empty($request->hall['what_time_does_the_hall_close']) ? $request->hall['what_time_does_the_hall_close'] : null;
            $hallDetails->observe_social_distancing_measures = !empty($request->hall['observe_social_distancing_measures']) ? $request->hall['observe_social_distancing_measures'] : null;
            $hallDetails->wide_space_between_tables = !empty($request->hall['wide_space_between_tables']) ? $request->hall['wide_space_between_tables'] : null;
            $hallDetails->complete_cleanse_before_every_event = !empty($request->hall['complete_cleanse_before_every_event']) ? $request->hall['complete_cleanse_before_every_event'] : null;
            $hallDetails->hand_sanitizer_in_specific_places = !empty($request->hall['hand_sanitizer_in_specific_places']) ? $request->hall['hand_sanitizer_in_specific_places'] : null;
            $hallDetails->sterile_wipes_for_each_table = !empty($request->hall['sterile_wipes_for_each_table']) ? $request->hall['sterile_wipes_for_each_table'] : null;
            $hallDetails->regular_ventilation_of_the_hall = !empty($request->hall['regular_ventilation_of_the_hall']) ? $request->hall['regular_ventilation_of_the_hall'] : null;
            $hallDetails->hospitality_in_special_and_closed_boxes = !empty($request->hall['hospitality_in_special_and_closed_boxes']) ? $request->hall['hospitality_in_special_and_closed_boxes'] : null;
            $hallDetails->disposable_eating_utensils = !empty($request->hall['disposable_eating_utensils']) ? $request->hall['disposable_eating_utensils'] : null;
            $hallDetails->providing_the_service_staff_with_gloves_and_masks = !empty($request->hall['providing_the_service_staff_with_gloves_and_masks']) ? $request->hall['providing_the_service_staff_with_gloves_and_masks'] : null;
            $hallDetails->temperature_measuring_devices_at_the_entrance = !empty($request->hall['temperature_measuring_devices_at_the_entrance']) ? $request->hall['temperature_measuring_devices_at_the_entrance'] : null;
            $hallDetails->sensor_operated_faucets = !empty($request->hall['sensor_operated_faucets']) ? $request->hall['sensor_operated_faucets'] : null;
            $hallDetails->update();
        } else {
            $hotelDetails = $hall->hotelDetails;
            $hotelDetails->hall_id = $hall->id;
            $hotelDetails->stars = !empty($request->hotel['stars']) ? $request->hotel['stars'] : null;
            $hotelDetails->hall_count = !empty($request->hotel['hall_count']) ? $request->hotel['hall_count'] : null;
            $hotelDetails->dining_hall = !empty($request->hotel['dining_hall']) ? $request->hotel['dining_hall'] : null;
            $hotelDetails->room_count = !empty($request->hotel['room_count']) ? $request->hotel['room_count'] : null;
            $hotelDetails->free_suite = !empty($request->hotel['free_suite']) ? $request->hotel['free_suite'] : null;
            $hotelDetails->sacrifices = !empty($request->hotel['sacrifices']) ? $request->hotel['sacrifices'] : null;
            $hotelDetails->hot_cold_drinks = !empty($request->hotel['hot_cold_drinks']) ? $request->hotel['hot_cold_drinks'] : null;
            $hotelDetails->lights = !empty($request->hotel['lights']) ? $request->hotel['lights'] : null;
            $hotelDetails->photography_and_video = !empty($request->hotel['photography_and_video']) ? $request->hotel['photography_and_video'] : null;
            $hotelDetails->separate_entrance = !empty($request->hotel['separate_entrance']) ? $request->hotel['separate_entrance'] : null;
            $hotelDetails->staircase_wedding = !empty($request->hotel['staircase_wedding']) ? $request->hotel['staircase_wedding'] : null;
            $hotelDetails->phone_inspector = !empty($request->hotel['phone_inspector']) ? $request->hotel['phone_inspector'] : null;
            $hotelDetails->abayas_official = !empty($request->hotel['abayas_official']) ? $request->hotel['abayas_official'] : null;
            $hotelDetails->hall_supervisor = !empty($request->hotel['hall_supervisor']) ? $request->hotel['hall_supervisor'] : null;
            $hotelDetails->wedding_cake = !empty($request->hotel['wedding_cake']) ? $request->hotel['wedding_cake'] : null;
            $hotelDetails->female_workers = !empty($request->hotel['female_workers']) ? $request->hotel['female_workers'] : null;
            $hotelDetails->subs_directs = !empty($request->hotel['subs_directs']) ? $request->hotel['subs_directs'] : null;
            $hotelDetails->coffee_men = !empty($request->hotel['coffee_men']) ? $request->hotel['coffee_men'] : null;
            $hotelDetails->buffet_company = !empty($request->hotel['buffet_company']) ? $request->hotel['buffet_company'] : null;
            $hotelDetails->holding_several_parties_at_the_same_time = !empty($request->hotel['holding_several_parties_at_the_same_time']) ? $request->hotel['holding_several_parties_at_the_same_time'] : null;
            $hotelDetails->car_parking = !empty($request->hotel['car_parking']) ? $request->hotel['car_parking'] : null;
            $hotelDetails->kosha_and_hall_coordination = !empty($request->hotel['kosha_and_hall_coordination']) ? $request->hotel['kosha_and_hall_coordination'] : null;
            $hotelDetails->dj = !empty($request->hotel['dj']) ? $request->hotel['dj'] : null;
            $hotelDetails->bride_room = !empty($request->hotel['bride_room']) ? $request->hotel['bride_room'] : null;
            $hotelDetails->food_buffet = !empty($request->hotel['food_buffet']) ? $request->hotel['food_buffet'] : null;
            $hotelDetails->possibility_of_holding_men_wedding = !empty($request->hotel['possibility_of_holding_men_wedding']) ? $request->hotel['possibility_of_holding_men_wedding'] : null;
            $hotelDetails->possibility_of_separating_halls = !empty($request->hotel['possibility_of_separating_halls']) ? $request->hotel['possibility_of_separating_halls'] : null;
            $hotelDetails->separate_dining_hall = !empty($request->hotel['separate_dining_hall']) ? $request->hotel['separate_dining_hall'] : null;
            $hotelDetails->external_hall = !empty($request->hotel['external_hall']) ? $request->hotel['external_hall'] : null;
            $hotelDetails->price_includes_dinner = !empty($request->hotel['price_includes_dinner']) ? $request->hotel['price_includes_dinner'] : null;
            $hotelDetails->allow_food_from_outside = !empty($request->hotel['allow_food_from_outside']) ? $request->hotel['allow_food_from_outside'] : null;
            $hotelDetails->what_is_the_minimum_number_to_reserve_the_hall = !empty($request->hotel['what_is_the_minimum_number_to_reserve_the_hall']) ? $request->hotel['what_is_the_minimum_number_to_reserve_the_hall'] : null;
            $hotelDetails->what_time_does_the_hall_close = !empty($request->hotel['what_time_does_the_hall_close']) ? $request->hotel['what_time_does_the_hall_close'] : null;
            $hotelDetails->what_events_can_be_hosted = !empty($request->hotel['what_events_can_be_hosted']) ? $request->hotel['what_events_can_be_hosted'] : null;
            $hotelDetails->observe_social_distancing_measures = !empty($request->hotel['observe_social_distancing_measures']) ? $request->hotel['observe_social_distancing_measures'] : null;
            $hotelDetails->wide_space_between_tables = !empty($request->hotel['wide_space_between_tables']) ? $request->hotel['wide_space_between_tables'] : null;
            $hotelDetails->complete_cleanse_before_every_event = !empty($request->hotel['complete_cleanse_before_every_event']) ? $request->hotel['complete_cleanse_before_every_event'] : null;
            $hotelDetails->hand_sanitizer_in_specific_places = !empty($request->hotel['hand_sanitizer_in_specific_places']) ? $request->hotel['hand_sanitizer_in_specific_places'] : null;
            $hotelDetails->sterile_wipes_for_each_table = !empty($request->hotel['sterile_wipes_for_each_table']) ? $request->hotel['sterile_wipes_for_each_table'] : null;
            $hotelDetails->regular_ventilation_of_the_hall = !empty($request->hotel['regular_ventilation_of_the_hall']) ? $request->hotel['regular_ventilation_of_the_hall'] : null;
            $hotelDetails->hospitality_in_special_and_closed_boxes = !empty($request->hotel['hospitality_in_special_and_closed_boxes']) ? $request->hotel['hospitality_in_special_and_closed_boxes'] : null;
            $hotelDetails->disposable_eating_utensils = !empty($request->hotel['disposable_eating_utensils']) ? $request->hotel['disposable_eating_utensils'] : null;
            $hotelDetails->providing_the_service_staff_with_gloves_and_masks = !empty($request->hotel['providing_the_service_staff_with_gloves_and_masks']) ? $request->hotel['providing_the_service_staff_with_gloves_and_masks'] : null;
            $hotelDetails->temperature_measuring_devices_at_the_entrance = !empty($request->hotel['temperature_measuring_devices_at_the_entrance']) ? $request->hotel['temperature_measuring_devices_at_the_entrance'] : null;
            $hotelDetails->sensor_operated_faucets = !empty($request->hotel['sensor_operated_faucets']) ? $request->hotel['sensor_operated_faucets'] : null;
            $hotelDetails->update();
        }


        $data = $request->except('images', '_token', '_method', 'ipinfo', 'hotel', 'hall');
        $hall->update($data);
        $hallEdit = new HallEdit();
        $hallEdit->user_id = auth()->user()->id;
        $hallEdit->hall_id = $hall->id;
        $hallEdit->actions = $actions;
        $hallEdit->save();
        return redirect()->route('admin.hall.index')->with('success', 'تم تعديل القاعه بنجاح');
    }

    public function search(Request $request)
    {
        $items = Hall::query()
            ->where('name_ar', $request->res)
            ->orWhere('city_id', $request->city_id)
            ->orWhere('type', $request->type)
            ->paginate(20);
        return view('admin.hall.index', compact('items'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        if (!empty($hall->images)) {
            foreach ($hall->images as $image) {
                deleteFile($image->path);
            }
        }
        $hall->delete();
        return redirect()->route('admin.hall.index')->with('success', 'تم حذف القاعه بنجاح');
    }
}
