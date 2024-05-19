<p class="text-black-50">
    <b>سعة قسم الرجال : </b>
    {{$hall->hallDetails->men_size}}
</p>
<p class="text-black-50">
    <b>سعة قسم النساء : </b>
    {{$hall->hallDetails->women_size}}
</p>
<p class="text-black-50">
    <b>سعة صالة الطعام : </b>
    {{$hall->hallDetails->dining_room_size}}
</p>
<p class="text-black-50">
    <b>عدد القاعات في الصالة : </b>
    {{$hall->hallDetails->hall_count}}
</p>
<p class="text-black-50">
    <b>إمكانية فصل القاعات : </b>
    {{$hall->hallDetails->separating_halls == '0' ? 'يمكن' : 'لايمكن'}}
</p>
<p class="text-black-50">
    <b>قاعة طعام منفصلة : </b>
    {{$hall->hallDetails->separate_dining_hall == '0' ? 'يمكن' : 'لايمكن'}}
</p>
<p class="text-black-50">
    <b>مجلس رجال : </b>
    {{$hall->hallDetails->men_council == '0' ? 'يمكن' : 'لايمكن'}}
</p>
<p class="text-black-50">
    <b>جناح مجاني للعروسين ليلة الزفاف : </b>
    {{$hall->hallDetails->free_suite == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>ذبائح : </b>
    {{$hall->hallDetails->sacrifices == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مشروبات ساخنة وباردة : </b>
    {{$hall->hallDetails->hot_cold_drinks == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>إضاءة - ليزر - بخار وكشاف عروس : </b>
    {{$hall->hallDetails->lights == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>التصوير الفوتوغرافي والفيديو : </b>
    {{$hall->hallDetails->photography_and_video == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مدخل مستقل للعروس : </b>
    {{$hall->hallDetails->separate_entrance == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>درج للزفة : </b>
    {{$hall->hallDetails->staircase_wedding == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مفتشة جوالات : </b>
    {{$hall->hallDetails->phone_inspector == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مسؤولة عبايات : </b>
    {{$hall->hallDetails->abayas_official == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مشرفة قاعة : </b>
    {{$hall->hallDetails->hall_supervisor == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>طقاقة : </b>
    {{$hall->hallDetails->click == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>كيك الزفاف : </b>
    {{$hall->hallDetails->wedding_cake == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>عاملات : </b>
    {{$hall->hallDetails->female_workers == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>صبابات ومباشرات : </b>
    {{$hall->hallDetails->subs_directs == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>قهوجية للرجال : </b>
    {{$hall->hallDetails->coffee_men == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>حراسة امنية : </b>
    {{$hall->hallDetails->security_guard == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>توفير شركة بوفيه : </b>
    {{$hall->hallDetails->buffet_company == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>إمكانية اقامة عدة حفلات في نفس الوقت : </b>
    {{$hall->hallDetails->holding_several_parties_at_the_same_time == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>كراج سيارات : </b>
    {{$hall->hallDetails->car_parking == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>السماح بدخول الأطفال : </b>
    {{$hall->hallDetails->entry_children == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>الكوشة وتنسيق القاعة : </b>
    {{$hall->hallDetails->kosha_and_hall_coordination == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>دي جي - اجهزة صوتية : </b>
    {{$hall->hallDetails->dj == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>غرفة للعروس : </b>
    {{$hall->hallDetails->bride_room == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>غرفة لكبار الزوار VIP : </b>
    {{$hall->hallDetails->vip_room == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>بوفيه الطعام : </b>
    {{$hall->hallDetails->food_buffet == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>السعر أقل عند حجز قاعة النساء فقط : </b>
    {{$hall->hallDetails->the_price_is_lower_when_booking_the_women_hall_only == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>السعر يتضمن العشاء : </b>
    {{$hall->hallDetails->the_price_includes_dinner == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>هل السعر يختلف عند الحجز بأيام العطل و نهاية الاسبوع : </b>
    {{$hall->hallDetails->does_the_price_differ_when_booking_on_holidays_and_weekend == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>لا يتم الحجز من دون عشاء : </b>
    {{$hall->hallDetails->reservations_are_not_made_without_dinner == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>ما هو أقل عدد لحجز القاعة : </b>
    {{$hall->hallDetails->what_is_the_minimum_number_to_reserve_the_hall}}
</p>
<p class="text-black-50">
    <b>في أي وقت تغلق القاعة : </b>
    {{$hall->hallDetails->what_time_does_the_hall_close}}
</p>
<p class="text-black-50">
    <b>مراعاة تدابير التباعد الاجتماعي : </b>
    {{$hall->hallDetails->observe_social_distancing_measures == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مسافة واسعة بين الطاولات : </b>
    {{$hall->hallDetails->wide_space_between_tables == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>تطهير كامل قبل كل مناسبة : </b>
    {{$hall->hallDetails->complete_cleanse_before_every_event == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>معقم اليدين في اماكن محددة : </b>
    {{$hall->hallDetails->hand_sanitizer_in_specific_places == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>مناديل معقمة لكل طاولة : </b>
    {{$hall->hallDetails->sterile_wipes_for_each_table == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>تهوية منتظمة للقاعة : </b>
    {{$hall->hallDetails->regular_ventilation_of_the_hall == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>الضيافة في صناديق خاصة و مغلقة : </b>
    {{$hall->hallDetails->hospitality_in_special_and_closed_boxes == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>ادوات طعام للاستعمال مرة واحدة : </b>
    {{$hall->hallDetails->disposable_eating_utensils == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>تزويد طاقم الخدمة بالقفازات والأقنعة : </b>
    {{$hall->hallDetails->providing_the_service_staff_with_gloves_and_masks == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>أجهزة قياس الحرارة عند المدخل : </b>
    {{$hall->hallDetails->temperature_measuring_devices_at_the_entrance == '0' ? 'نعم' : 'لا'}}
</p>
<p class="text-black-50">
    <b>صنابير تعمل بالحساسات : </b>
    {{$hall->hallDetails->sensor_operated_faucets == '0' ? 'نعم' : 'لا'}}
</p>
