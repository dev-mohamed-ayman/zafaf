<p class="text-black-50">
    <b>عدد نجوم الفندق : </b>
    {{$hall->hotelDetails->stars}}
</p>
<p class="text-black-50">
    <b>عدد القاعات بالفندق : </b>
    {{$hall->hotelDetails->hall_count}}
</p>
<p class="text-black-50">
    <b>سعة قاعة الطعام : </b>
    {{$hall->hotelDetails->dining_hall}}
</p>
<p class="text-black-50">
    <b>كم عدد الغرف في الفندق : </b>
    {{$hall->hotelDetails->room_count}}
</p>
<p class="text-black-50">
    <b>جناح مجاني للعروسين ليلة الزفاف : </b>
    {{$hall->hotelDetails->free_suite == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>ذبائح : </b>
    {{$hall->hotelDetails->sacrifices == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مشروبات ساخنة وباردة : </b>
    {{$hall->hotelDetails->hot_cold_drinks == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>إضاءة - ليزر - بخار وكشاف عروس : </b>
    {{$hall->hotelDetails->lights == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>التصوير الفوتوغرافي والفيديو : </b>
    {{$hall->hotelDetails->photography_and_video == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مدخل مستقل للعروس : </b>
    {{$hall->hotelDetails->separate_entrance == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>درج للزفة : </b>
    {{$hall->hotelDetails->staircase_wedding == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مفتشة جوالات : </b>
    {{$hall->hotelDetails->phone_inspector == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مسؤولة عبايات : </b>
    {{$hall->hotelDetails->abayas_official == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مشرفة قاعة : </b>
    {{$hall->hotelDetails->hall_supervisor == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>كيك الزفاف : </b>
    {{$hall->hotelDetails->wedding_cake == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>عاملات : </b>
    {{$hall->hotelDetails->female_workers == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>صبابات ومباشرات : </b>
    {{$hall->hotelDetails->subs_directs == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>قهوجية للرجال : </b>
    {{$hall->hotelDetails->coffee_men == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>توفير شركة بوفيه : </b>
    {{$hall->hotelDetails->buffet_company == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>إمكانية اقامة عدة حفلات في نفس الوقت : </b>
    {{$hall->hotelDetails->holding_several_parties_at_the_same_time == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>كراج سيارات : </b>
    {{$hall->hotelDetails->car_parking == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>الكوشة وتنسيق القاعة : </b>
    {{$hall->hotelDetails->kosha_and_hall_coordination == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>دي جي - اجهزة صوتية : </b>
    {{$hall->hotelDetails->dj == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>غرفة للعروس : </b>
    {{$hall->hotelDetails->bride_room == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>بوفيه الطعام : </b>
    {{$hall->hotelDetails->food_buffet == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>إمكانية اقامة عرس الرجال : </b>
    {{$hall->hotelDetails->possibility_of_holding_men_wedding == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>امكانية فصل القاعات : </b>
    {{$hall->hotelDetails->possibility_of_separating_halls == '0' ? 'يمكن' : 'لايمكن'}}
</p>
<p class="text-black-50">
    <b>قاعة طعام منفصلة : </b>
    {{$hall->hotelDetails->separate_dining_hall == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>قاعة خارجية : </b>
    {{$hall->hotelDetails->external_hall == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>السعر يتضمن العشاء : </b>
    {{$hall->hotelDetails->price_includes_dinner == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>السماح بالطعام من الخارج : </b>
    {{$hall->hotelDetails->allow_food_from_outside == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>ما هو أقل عدد لحجز القاعة : </b>
    {{$hall->hotelDetails->what_is_the_minimum_number_to_reserve_the_hall}}
</p>
<p class="text-black-50">
    <b>في أي وقت تغلق القاعة : </b>
    {{$hall->hotelDetails->what_time_does_the_hall_close}}
</p>
<p class="text-black-50">
    <b>ما هي المناسبات التي يمكن استضافتها : </b>
    {{$hall->hotelDetails->what_events_can_be_hosted}}
</p>
<p class="text-black-50">
    <b>مراعاة تدابير التباعد الاجتماعي : </b>
    {{$hall->hotelDetails->observe_social_distancing_measures == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مسافة واسعة بين الطاولات : </b>
    {{$hall->hotelDetails->wide_space_between_tables == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>تطهير كامل قبل كل مناسبة : </b>
    {{$hall->hotelDetails->complete_cleanse_before_every_event == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>معقم اليدين في اماكن محددة : </b>
    {{$hall->hotelDetails->hand_sanitizer_in_specific_places == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مناديل معقمة لكل طاولة : </b>
    {{$hall->hotelDetails->sterile_wipes_for_each_table == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>تهوية منتظمة للقاعة : </b>
    {{$hall->hotelDetails->regular_ventilation_of_the_hall == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>الضيافة في صناديق خاصة و مغلقة : </b>
    {{$hall->hotelDetails->hospitality_in_special_and_closed_boxes == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>ادوات طعام للاستعمال مرة واحدة : </b>
    {{$hall->hotelDetails->disposable_eating_utensils == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>تزويد طاقم الخدمة بالقفازات والأقنعة : </b>
    {{$hall->hotelDetails->providing_the_service_staff_with_gloves_and_masks == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>أجهزة قياس الحرارة عند المدخل : </b>
    {{$hall->hotelDetails->temperature_measuring_devices_at_the_entrance == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>صنابير تعمل بالحساسات : </b>
    {{$hall->hotelDetails->sensor_operated_faucets == '0' ? 'نعم' : 'لا'}}
</p>
