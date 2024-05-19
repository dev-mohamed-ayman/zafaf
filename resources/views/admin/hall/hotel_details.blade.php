<div class="form-group col-md-6">
    <label class="form-label">عدد نجوم الفندق</label>
    <input type="text" name="hotel[stars]" value="{{old('hotel[stars]')}}" class="form-control"
           placeholder="عدد نجوم الفندق">
</div>
<div class="form-group col-md-6">
    <label class="form-label">عدد القاعات بالفندق</label>
    <input type="text" name="hotel[hall_count]" value="{{old('hotel[hall_count]')}}" class="form-control"
           placeholder="عدد القاعات بالفندق">
</div>
<div class="form-group col-md-6">
    <label class="form-label">سعة قاعة الطعام</label>
    <input type="text" name="hotel[dining_hall]" value="{{old('hotel[dining_hall]')}}" class="form-control"
           placeholder="سعة قاعة الطعام">
</div>
<div class="form-group col-md-6">
    <label class="form-label">كم عدد الغرف في الفندق</label>
    <input type="text" name="hotel[room_count]" value="{{old('hotel[room_count]')}}" class="form-control"
           placeholder="كم عدد الغرف في الفندق">
</div>
<div class="form-group col-md-6">
    <label class="form-label">جناح مجاني للعروسين ليلة الزفاف</label>
    <select name="hotel[free_suite]" class="form-control">
        <option disabled selected>جناح مجاني للعروسين ليلة الزفاف</option>
        <option value="0" {{ old('hotel[free_suite]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[free_suite]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">ذبائح</label>
    <select name="hotel[sacrifices]" class="form-control">
        <option disabled selected>ذبائح</option>
        <option value="0" {{ old('hotel[sacrifices]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[sacrifices]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مشروبات ساخنة وباردة</label>
    <select name="hotel[hot_cold_drinks]" class="form-control">
        <option disabled selected>مشروبات ساخنة وباردة</option>
        <option value="0" {{ old('hotel[hot_cold_drinks]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[hot_cold_drinks]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">إضاءة - ليزر - بخار وكشاف عروس</label>
    <select name="hotel[lights]" class="form-control">
        <option disabled selected>إضاءة - ليزر - بخار وكشاف عروس</option>
        <option value="0" {{ old('hotel[lights]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[lights]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">التصوير الفوتوغرافي والفيديو</label>
    <select name="hotel[photography_and_video]" class="form-control">
        <option disabled selected>التصوير الفوتوغرافي والفيديو</option>
        <option value="0" {{ old('hotel[photography_and_video]') == '0' ? 'selected' : '' }}>يوجد
        </option>
        <option value="1" {{ old('hotel[photography_and_video]') == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مدخل مستقل للعروس</label>
    <select name="hotel[separate_entrance]" class="form-control">
        <option disabled selected>مدخل مستقل للعروس</option>
        <option value="0" {{ old('hotel[separate_entrance]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[separate_entrance]') == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">درج للزفة</label>
    <select name="hotel[staircase_wedding]" class="form-control">
        <option disabled selected>درج للزفة</option>
        <option value="0" {{ old('hotel[staircase_wedding]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[staircase_wedding]') == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مفتشة جوالات</label>
    <select name="hotel[phone_inspector]" class="form-control">
        <option disabled selected>مفتشة جوالات</option>
        <option value="0" {{ old('hotel[phone_inspector]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[phone_inspector]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مسؤولة عبايات</label>
    <select name="hotel[abayas_official]" class="form-control">
        <option disabled selected>مسؤولة عبايات</option>
        <option value="0" {{ old('hotel[abayas_official]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[abayas_official]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مشرفة قاعة</label>
    <select name="hotel[hall_supervisor]" class="form-control">
        <option disabled selected>مشرفة قاعة</option>
        <option value="0" {{ old('hotel[hall_supervisor]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[hall_supervisor]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">كيك الزفاف</label>
    <select name="hotel[wedding_cake]" class="form-control">
        <option disabled selected>كيك الزفاف</option>
        <option value="0" {{ old('hotel[wedding_cake]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[wedding_cake]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label"> عاملات</label>
    <select name="hotel[female_workers]" class="form-control">
        <option disabled selected> عاملات</option>
        <option value="0" {{ old('hotel[female_workers]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[female_workers]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label"> صبابات ومباشرات</label>
    <select name="hotel[subs_directs]" class="form-control">
        <option disabled selected> صبابات ومباشرات</option>
        <option value="0" {{ old('hotel[subs_directs]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[subs_directs]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">قهوجية للرجال</label>
    <select name="hotel[coffee_men]" class="form-control">
        <option disabled selected>قهوجية للرجال</option>
        <option value="0" {{ old('hotel[coffee_men]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[coffee_men]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">توفير شركة بوفيه</label>
    <select name="hotel[buffet_company]" class="form-control">
        <option disabled selected>توفير شركة بوفيه</option>
        <option value="0" {{ old('hotel[buffet_company]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[buffet_company]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">إمكانية اقامة عدة حفلات في نفس الوقت</label>
    <select name="hotel[holding_several_parties_at_the_same_time]" class="form-control">
        <option disabled selected>إمكانية اقامة عدة حفلات في نفس الوقت</option>
        <option value="0" {{ old('hotel[holding_several_parties_at_the_same_time]') == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hotel[holding_several_parties_at_the_same_time]') == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">كراج سيارات</label>
    <select name="hotel[car_parking]" class="form-control">
        <option disabled selected>كراج سيارات</option>
        <option value="0" {{ old('hotel[car_parking]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[car_parking]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">الكوشة وتنسيق القاعة</label>
    <select name="hotel[kosha_and_hall_coordination]" class="form-control">
        <option disabled selected>الكوشة وتنسيق القاعة</option>
        <option value="0" {{ old('hotel[kosha_and_hall_coordination]') == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hotel[kosha_and_hall_coordination]') == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">دي جي - اجهزة صوتية </label>
    <select name="hotel[dj]" class="form-control">
        <option disabled selected>دي جي - اجهزة صوتية</option>
        <option value="0" {{ old('hotel[dj]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[dj]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">غرفة للعروس</label>
    <select name="hotel[bride_room]" class="form-control">
        <option disabled selected>غرفة للعروس</option>
        <option value="0" {{ old('hotel[bride_room]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[bride_room]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">بوفيه الطعام</label>
    <select name="hotel[food_buffet]" class="form-control">
        <option disabled selected>بوفيه الطعام</option>
        <option value="0" {{ old('hotel[food_buffet]') == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hotel[food_buffet]') == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">إمكانية اقامة عرس الرجال</label>
    <select name="hotel[possibility_of_holding_men_wedding]" class="form-control">
        <option disabled selected>إمكانية اقامة عرس الرجال</option>
        <option value="0" {{ old('hotel[possibility_of_holding_men_wedding]') == '0' ? 'selected' : '' }}>نعم</option>
        <option value="1" {{ old('hotel[possibility_of_holding_men_wedding]') == '1' ? 'selected' : '' }}>لا</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">امكانية فصل القاعات</label>
    <select name="hotel[possibility_of_separating_halls]" class="form-control">
        <option disabled selected>امكانية فصل القاعات</option>
        <option value="0" {{ old('hotel[possibility_of_separating_halls]') == '0' ? 'selected' : '' }}>نعم</option>
        <option value="1" {{ old('hotel[possibility_of_separating_halls]') == '1' ? 'selected' : '' }}>لا</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">قاعة طعام منفصلة</label>
    <select name="hotel[separate_dining_hall]" class="form-control">
        <option disabled selected>قاعة طعام منفصلة</option>
        <option value="0" {{ old('hotel[separate_dining_hall]') == '0' ? 'selected' : '' }}>نعم</option>
        <option value="1" {{ old('hotel[separate_dining_hall]') == '1' ? 'selected' : '' }}>لا</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">قاعة خارجية</label>
    <select name="hotel[external_hall]" class="form-control">
        <option disabled selected>قاعة خارجية</option>
        <option value="0" {{ old('hotel[external_hall]') == '0' ? 'selected' : '' }}>نعم</option>
        <option value="1" {{ old('hotel[external_hall]') == '1' ? 'selected' : '' }}>لا</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">السعر يتضمن العشاء؟</label>
    <select name="hotel[price_includes_dinner]" class="form-control">
        <option disabled selected>السعر يتضمن العشاء؟</option>
        <option value="0" {{ old('hotel[price_includes_dinner]') == '0' ? 'selected' : '' }}>نعم</option>
        <option value="1" {{ old('hotel[price_includes_dinner]') == '1' ? 'selected' : '' }}>لا</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">السماح بالطعام من الخارج</label>
    <select name="hotel[allow_food_from_outside]" class="form-control">
        <option disabled selected>السماح بالطعام من الخارج</option>
        <option value="0" {{ old('hotel[allow_food_from_outside]') == '0' ? 'selected' : '' }}>نعم</option>
        <option value="1" {{ old('hotel[allow_food_from_outside]') == '1' ? 'selected' : '' }}>لا</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">ما هو أقل عدد لحجز القاعة؟</label>
    <input type="text" name="hotel[what_is_the_minimum_number_to_reserve_the_hall]"
           value="{{old('hotel[what_is_the_minimum_number_to_reserve_the_hall]')}}"
           class="form-control"
           placeholder="ما هو أقل عدد لحجز القاعة؟">
</div>
<div class="form-group col-md-6">
    <label class="form-label">في أي وقت تغلق القاعة؟</label>
    <input type="text" name="hotel[what_time_does_the_hall_close]"
           value="{{old('hotel[what_time_does_the_hall_close]')}}" class="form-control"
           placeholder="في أي وقت تغلق القاعة؟">
</div>
<div class="form-group col-md-6">
    <label class="form-label">ما هي المناسبات التي يمكن استضافتها؟</label>
    <input type="text" name="hotel[what_events_can_be_hosted]"
           value="{{old('hotel[what_events_can_be_hosted]')}}" class="form-control"
           placeholder="ما هي المناسبات التي يمكن استضافتها؟">
</div>
<div class="form-group col-md-6">
    <label class="form-label">مراعاة تدابير التباعد الاجتماعي </label>
    <select name="hotel[observe_social_distancing_measures]" class="form-control">
        <option disabled selected>مراعاة تدابير التباعد الاجتماعي</option>
        <option value="0" {{ old('hotel[observe_social_distancing_measures]') == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hotel[observe_social_distancing_measures]') == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مسافة واسعة بين الطاولات </label>
    <select name="hotel[wide_space_between_tables]" class="form-control">
        <option disabled selected>مسافة واسعة بين الطاولات</option>
        <option value="0" {{ old('hotel[wide_space_between_tables]') == '0' ? 'selected' : '' }}>نعم
        </option>
        <option value="1" {{ old('hotel[wide_space_between_tables]') == '1' ? 'selected' : '' }}>لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">تطهير كامل قبل كل مناسبة </label>
    <select name="hotel[complete_cleanse_before_every_event]" class="form-control">
        <option disabled selected>تطهير كامل قبل كل مناسبة</option>
        <option value="0" {{ old('hotel[complete_cleanse_before_every_event]') == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hotel[complete_cleanse_before_every_event]') == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">معقم اليدين في اماكن محددة </label>
    <select name="hotel[hand_sanitizer_in_specific_places]" class="form-control">
        <option disabled selected>معقم اليدين في اماكن محددة</option>
        <option value="0" {{ old('hotel[hand_sanitizer_in_specific_places]') == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hotel[hand_sanitizer_in_specific_places]') == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مناديل معقمة لكل طاولة</label>
    <select name="hotel[sterile_wipes_for_each_table]" class="form-control">
        <option disabled selected>مناديل معقمة لكل طاولة</option>
        <option value="0" {{ old('hotel[sterile_wipes_for_each_table]') == '0' ? 'selected' : '' }}>نعم
        </option>
        <option value="1" {{ old('hotel[sterile_wipes_for_each_table]') == '1' ? 'selected' : '' }}>لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">تهوية منتظمة للقاعة </label>
    <select name="hotel[regular_ventilation_of_the_hall]" class="form-control">
        <option disabled selected>تهوية منتظمة للقاعة</option>
        <option value="0" {{ old('hotel[regular_ventilation_of_the_hall]') == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hotel[regular_ventilation_of_the_hall]') == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">الضيافة في صناديق خاصة و مغلقة</label>
    <select name="hotel[hospitality_in_special_and_closed_boxes]" class="form-control">
        <option disabled selected>الضيافة في صناديق خاصة و مغلقة</option>
        <option value="0" {{ old('hotel[hospitality_in_special_and_closed_boxes]') == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hotel[hospitality_in_special_and_closed_boxes]') == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">ادوات طعام للاستعمال مرة واحدة</label>
    <select name="hotel[disposable_eating_utensils]" class="form-control">
        <option disabled selected>ادوات طعام للاستعمال مرة واحدة</option>
        <option value="0" {{ old('hotel[disposable_eating_utensils]') == '0' ? 'selected' : '' }}>نعم
        </option>
        <option value="1" {{ old('hotel[disposable_eating_utensils]') == '1' ? 'selected' : '' }}>لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label"> تزويد طاقم الخدمة بالقفازات والأقنعة</label>
    <select name="hotel[providing_the_service_staff_with_gloves_and_masks]" class="form-control">
        <option disabled selected> تزويد طاقم الخدمة بالقفازات والأقنعة</option>
        <option value="0" {{ old('hotel[providing_the_service_staff_with_gloves_and_masks]') == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hotel[providing_the_service_staff_with_gloves_and_masks]') == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">أجهزة قياس الحرارة عند المدخل</label>
    <select name="hotel[temperature_measuring_devices_at_the_entrance]" class="form-control">
        <option disabled selected>أجهزة قياس الحرارة عند المدخل</option>
        <option value="0" {{ old('hotel[temperature_measuring_devices_at_the_entrance]') == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hotel[temperature_measuring_devices_at_the_entrance]') == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">صنابير تعمل بالحساسات</label>
    <select name="hotel[sensor_operated_faucets]" class="form-control">
        <option disabled selected>صنابير تعمل بالحساسات</option>
        <option value="0" {{ old('hotel[sensor_operated_faucets]') == '0' ? 'selected' : '' }}>نعم
        </option>
        <option value="1" {{ old('hotel[sensor_operated_faucets]') == '1' ? 'selected' : '' }}>لا
        </option>
    </select>
</div>
