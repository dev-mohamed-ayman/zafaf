<div class="form-group col-md-6">
    <label class="form-label">سعة قسم النساء</label>
    <input type="text" name="hall[women_size]" value="{{old('hall[men_size]', $hallDetails->men_size)}}"
           class="form-control"
           placeholder="سعة قسم النساء">
</div>
<div class="form-group col-md-6">
    <label class="form-label">سعة قسم الرجال</label>
    <input type="text" name="hall[men_size]" value="{{old('hall[women_size]', $allDetails->women_size)}}"
           class="form-control"
           placeholder="سعة قسم الرجال">
</div>
<div class="form-group col-md-6">
    <label class="form-label">سعة صالة الطعام</label>
    <input type="text" name="hall[dining_room_size]"
           value="{{old('hall[dining_room_size]', $allDetails->dining_room_size)}}"
           class="form-control" placeholder="سعة صالة الطعام">
</div>
<div class="form-group col-md-6">
    <label class="form-label">عدد القاعات في الصالة </label>
    <input type="text" name="hall[hall_count]" value="{{old('hall[hall_count]', $hallDetails->hall_count)}}"
           class="form-control"
           placeholder="عدد القاعات في الصالة ">
</div>
<div class="form-group col-md-6">
    <label class="form-label">إمكانية فصل القاعات</label>
    <select name="hall[separating_halls]" class="form-control">
        <option disabled selected>إمكانية فصل القاعات</option>
        <option value="0" {{ old('hall[separating_halls]', $hallDetails->separating_halls) == '0' ? 'selected' : '' }}>
            يمكن
        </option>
        <option value="1" {{ old('hall[separating_halls]', $hallDetails->separating_halls) == '1' ? 'selected' : '' }}>
            لايمكن
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">قاعة طعام منفصلة</label>
    <select name="hall[separate_dining_hall]" class="form-control">
        <option disabled selected>قاعة طعام منفصلة</option>
        <option value="0" {{ old('hall[separate_dining_hall]', $hallDetails->separate_dining_hall) == '0' ? 'selected' : '' }}>
            يمكن
        </option>
        <option value="1" {{ old('hall[separate_dining_hall]', $hallDetails->separate_dining_hall) == '1' ? 'selected' : '' }}>
            لايمكن
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مجلس رجال</label>
    <select name="hall[men_council]" class="form-control">
        <option disabled selected>مجلس رجال</option>
        <option value="0" {{ old('hall[men_council]', $allDetails->men_council) == '0' ? 'selected' : '' }}>يمكن
        </option>
        <option value="1" {{ old('hall[men_council]', $allDetails->men_council) == '1' ? 'selected' : '' }}>لايمكن
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">جناح مجاني للعروسين ليلة الزفاف</label>
    <select name="hall[free_suite]" class="form-control">
        <option disabled selected>جناح مجاني للعروسين ليلة الزفاف</option>
        <option value="0" {{ old('hall[free_suite]', $hallDetails->free_suite) == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hall[free_suite]', $hallDetails->free_suite) == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">ذبائح</label>
    <select name="hall[sacrifices]" class="form-control">
        <option disabled selected>ذبائح</option>
        <option value="0" {{ old('hall[sacrifices]', $hallDetails->sacrifices) == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hall[sacrifices]', $hallDetails->sacrifices) == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مشروبات ساخنة وباردة</label>
    <select name="hall[hot_cold_drinks]" class="form-control">
        <option disabled selected>مشروبات ساخنة وباردة</option>
        <option value="0" {{ old('hall[hot_cold_drinks]', $hallDetails->hot_cold_drinks) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[hot_cold_drinks]', $hallDetails->hot_cold_drinks) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">إضاءة - ليزر - بخار وكشاف عروس</label>
    <select name="hall[lights]" class="form-control">
        <option disabled selected>إضاءة - ليزر - بخار وكشاف عروس</option>
        <option value="0" {{ old('hall[lights]', $hallDetails->lights) == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hall[lights]', $hallDetails->lights) == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">التصوير الفوتوغرافي والفيديو</label>
    <select name="hall[photography_and_video]" class="form-control">
        <option disabled selected>التصوير الفوتوغرافي والفيديو</option>
        <option value="0" {{ old('hall[photography_and_video]', $hallDetails->photography_and_video) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[photography_and_video]', $hallDetails->photography_and_video) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مدخل مستقل للعروس</label>
    <select name="hall[separate_entrance]" class="form-control">
        <option disabled selected>مدخل مستقل للعروس</option>
        <option value="0" {{ old('hall[separate_entrance]', $hallDetails->separate_entrance) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[separate_entrance]', $hallDetails->separate_entrance) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">درج للزفة</label>
    <select name="hall[staircase_wedding]" class="form-control">
        <option disabled selected>درج للزفة</option>
        <option value="0" {{ old('hall[staircase_wedding]', $hallDetails->staircase_wedding) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[staircase_wedding]', $hallDetails->staircase_wedding) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مفتشة جوالات</label>
    <select name="hall[phone_inspector]" class="form-control">
        <option disabled selected>مفتشة جوالات</option>
        <option value="0" {{ old('hall[phone_inspector]', $hallDetails->phone_inspector) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[phone_inspector]', $hallDetails->phone_inspector) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مسؤولة عبايات</label>
    <select name="hall[abayas_official]" class="form-control">
        <option disabled selected>مسؤولة عبايات</option>
        <option value="0" {{ old('hall[abayas_official]', $hallDetails->abayas_official) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[abayas_official]', $allDetails->abayas_official) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مشرفة قاعة</label>
    <select name="hall[hall_supervisor]" class="form-control">
        <option disabled selected>مشرفة قاعة</option>
        <option value="0" {{ old('hall[hall_supervisor]', $allDetails->hall_supervisor) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[hall_supervisor]', $hallDetails->hall_supervisor) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">طقاقة</label>
    <select name="hall[click]" class="form-control">
        <option disabled selected>طقاقة</option>
        <option value="0" {{ old('hall[click]', $hallDetails->click) == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hall[click]', $hallDetails->click) == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">كيك الزفاف</label>
    <select name="hall[wedding_cake]" class="form-control">
        <option disabled selected>كيك الزفاف</option>
        <option value="0" {{ old('hall[wedding_cake]', $hallDetails->wedding_cake) == '0' ? 'selected' : '' }}>يوجد
        </option>
        <option value="1" {{ old('hall[wedding_cake]', $hallDetails->wedding_cake) == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label"> عاملات</label>
    <select name="hall[female_workers]" class="form-control">
        <option disabled selected> عاملات</option>
        <option value="0" {{ old('hall[female_workers]', $hallDetails->female_workers) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[female_workers]', $hallDetails->female_workers) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label"> صبابات ومباشرات</label>
    <select name="hall[subs_directs]" class="form-control">
        <option disabled selected> صبابات ومباشرات</option>
        <option value="0" {{ old('hall[subs_directs]', $hallDetails->subs_directs) == '0' ? 'selected' : '' }}>يوجد
        </option>
        <option value="1" {{ old('hall[subs_directs]', $hallDetails->subs_directs) == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">قهوجية للرجال</label>
    <select name="hall[coffee_men]" class="form-control">
        <option disabled selected>قهوجية للرجال</option>
        <option value="0" {{ old('hall[coffee_men]', $hallDetails->coffee_men) == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hall[coffee_men]', $hallDetails->coffee_men) == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label"> حراسة امنية</label>
    <select name="hall[security_guard]" class="form-control">
        <option disabled selected> حراسة امنية</option>
        <option value="0" {{ old('hall[security_guard]', $hallDetails->security_guard) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[security_guard]', $hallDetails->security_guard) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">توفير شركة بوفيه</label>
    <select name="hall[buffet_company]" class="form-control">
        <option disabled selected>توفير شركة بوفيه</option>
        <option value="0" {{ old('hall[buffet_company]', $hallDetails->buffet_company) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[buffet_company]', $hallDetails->buffet_company) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">إمكانية اقامة عدة حفلات في نفس الوقت</label>
    <select name="hall[holding_several_parties_at_the_same_time]" class="form-control">
        <option disabled selected>إمكانية اقامة عدة حفلات في نفس الوقت</option>
        <option value="0" {{ old('hall[holding_several_parties_at_the_same_time]', $hallDetails->holding_several_parties_at_the_same_time) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[holding_several_parties_at_the_same_time]', $hallDetails->holding_several_parties_at_the_same_time) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">كراج سيارات</label>
    <select name="hall[car_parking]" class="form-control">
        <option disabled selected>كراج سيارات</option>
        <option value="0" {{ old('hall[car_parking]', $hallDetails->car_parking) == '0' ? 'selected' : '' }}>يوجد
        </option>
        <option value="1" {{ old('hall[car_parking]', $hallDetails->car_parking) == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">السماح بدخول الأطفال</label>
    <select name="hall[entry_children]" class="form-control">
        <option disabled selected>السماح بدخول الأطفال</option>
        <option value="0" {{ old('hall[entry_children]', $hallDetails->entry_children) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[entry_children]', $hallDetails->entry_children) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">الكوشة وتنسيق القاعة</label>
    <select name="hall[kosha_and_hall_coordination]" class="form-control">
        <option disabled selected>الكوشة وتنسيق القاعة</option>
        <option value="0" {{ old('hall[kosha_and_hall_coordination]', $hallDetails->kosha_and_hall_coordination) == '0' ? 'selected' : '' }}>
            يوجد
        </option>
        <option value="1" {{ old('hall[kosha_and_hall_coordination]', $hallDetails->kosha_and_hall_coordination) == '1' ? 'selected' : '' }}>
            لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">دي جي - اجهزة صوتية </label>
    <select name="hall[dj]" class="form-control">
        <option disabled selected>دي جي - اجهزة صوتية</option>
        <option value="0" {{ old('hall[dj]', $hallDetails->dj) == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hall[dj]', $hallDetails->dj) == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">غرفة للعروس</label>
    <select name="hall[bride_room]" class="form-control">
        <option disabled selected>غرفة للعروس</option>
        <option value="0" {{ old('hall[bride_room]', $hallDetails->bride_room) == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hall[bride_room]', $hallDetails->bride_room) == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">غرفة لكبار الزوار VIP</label>
    <select name="hall[vip_room]" class="form-control">
        <option disabled selected>غرفة لكبار الزوار VIP</option>
        <option value="0" {{ old('hall[vip_room]', $hallDetails->vip_room) == '0' ? 'selected' : '' }}>يوجد</option>
        <option value="1" {{ old('hall[vip_room]', $hallDetails->vip_room) == '1' ? 'selected' : '' }}>لايوجد</option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">بوفيه الطعام</label>
    <select name="hall[food_buffet]" class="form-control">
        <option disabled selected>بوفيه الطعام</option>
        <option value="0" {{ old('hall[food_buffet]', $hallDetails->food_buffet) == '0' ? 'selected' : '' }}>يوجد
        </option>
        <option value="1" {{ old('hall[food_buffet]', $hallDetails->food_buffet) == '1' ? 'selected' : '' }}>لايوجد
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">السعر أقل عند حجز قاعة النساء فقط</label>
    <select name="hall[the_price_is_lower_when_booking_the_women_hall_only]" class="form-control">
        <option disabled selected>السعر أقل عند حجز قاعة النساء فقط</option>
        <option
                value="0" {{ old('hall[the_price_is_lower_when_booking_the_women_hall_only]', $hallDetails->the_price_is_lower_when_booking_the_women_hall_only) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option
                value="1" {{ old('hall[the_price_is_lower_when_booking_the_women_hall_only]', $hallDetails->the_price_is_lower_when_booking_the_women_hall_only) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">السعر يتضمن العشاء</label>
    <select name="hall[the_price_includes_dinner]" class="form-control">
        <option disabled selected>السعر يتضمن العشاء</option>
        <option value="0" {{ old('hall[the_price_includes_dinner]', $hallDetails->the_price_includes_dinner) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[the_price_includes_dinner]', $hallDetails->the_price_includes_dinner) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">هل السعر يختلف عند الحجز بأيام العطل و نهاية الاسبوع</label>
    <select name="hall[does_the_price_differ_when_booking_on_holidays_and_weekend]"
            class="form-control">
        <option disabled selected>هل السعر يختلف عند الحجز بأيام العطل و نهاية الاسبوع</option>
        <option
                value="0" {{ old('hall[does_the_price_differ_when_booking_on_holidays_and_weekend]', $hallDetails->does_the_price_differ_when_booking_on_holidays_and_weekend) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option
                value="1" {{ old('hall[does_the_price_differ_when_booking_on_holidays_and_weekend]', $hallDetails->does_the_price_differ_when_booking_on_holidays_and_weekend) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">لا يتم الحجز من دون عشاء</label>
    <select name="hall[reservations_are_not_made_without_dinner]" class="form-control">
        <option disabled selected>لا يتم الحجز من دون عشاء</option>
        <option value="0" {{ old('hall[reservations_are_not_made_without_dinner]', $hallDetails->reservations_are_not_made_without_dinner) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[reservations_are_not_made_without_dinner]', $allDetails->reservations_are_not_made_without_dinner) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">ما هو أقل عدد لحجز القاعة؟</label>
    <input type="text" name="hall[what_is_the_minimum_number_to_reserve_the_hall]"
           value="{{old('hall[what_is_the_minimum_number_to_reserve_the_hall]', $hallDetails->what_is_the_minimum_number_to_reserve_the_hall)}}"
           class="form-control"
           placeholder="ما هو أقل عدد لحجز القاعة؟">
</div>
<div class="form-group col-md-6">
    <label class="form-label">في أي وقت تغلق القاعة؟</label>
    <input type="text" name="hall[what_time_does_the_hall_close]"
           value="{{old('hall[what_time_does_the_hall_close]', $hallDetails->what_time_does_the_hall_close)}}"
           class="form-control"
           placeholder="في أي وقت تغلق القاعة؟">
</div>
<div class="form-group col-md-6">
    <label class="form-label">مراعاة تدابير التباعد الاجتماعي </label>
    <select name="hall[observe_social_distancing_measures]" class="form-control">
        <option disabled selected>مراعاة تدابير التباعد الاجتماعي</option>
        <option value="0" {{ old('hall[observe_social_distancing_measures]', $hallDetails->observe_social_distancing_measures) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[observe_social_distancing_measures]', $hallDetails->observe_social_distancing_measures) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مسافة واسعة بين الطاولات </label>
    <select name="hall[wide_space_between_tables]" class="form-control">
        <option disabled selected>مسافة واسعة بين الطاولات</option>
        <option value="0" {{ old('hall[wide_space_between_tables]', $hallDetails->wide_space_between_tables) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[wide_space_between_tables]', $hallDetails->wide_space_between_tables) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">تطهير كامل قبل كل مناسبة </label>
    <select name="hall[complete_cleanse_before_every_event]" class="form-control">
        <option disabled selected>تطهير كامل قبل كل مناسبة</option>
        <option value="0" {{ old('hall[complete_cleanse_before_every_event]', $hallDetails->complete_cleanse_before_every_event) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[complete_cleanse_before_every_event]', $hallDetails->complete_cleanse_before_every_event) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">معقم اليدين في اماكن محددة </label>
    <select name="hall[hand_sanitizer_in_specific_places]" class="form-control">
        <option disabled selected>معقم اليدين في اماكن محددة</option>
        <option value="0" {{ old('hall[hand_sanitizer_in_specific_places]', $allDetails->hand_sanitizer_in_specific_places) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[hand_sanitizer_in_specific_places]', $hallDetails->hand_sanitizer_in_specific_places) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">مناديل معقمة لكل طاولة</label>
    <select name="hall[sterile_wipes_for_each_table]" class="form-control">
        <option disabled selected>مناديل معقمة لكل طاولة</option>
        <option value="0" {{ old('hall[sterile_wipes_for_each_table]', $hallDetails->sterile_wipes_for_each_table) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[sterile_wipes_for_each_table]', $allDetails->sterile_wipes_for_each_table) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">تهوية منتظمة للقاعة </label>
    <select name="hall[regular_ventilation_of_the_hall]" class="form-control">
        <option disabled selected>تهوية منتظمة للقاعة</option>
        <option value="0" {{ old('hall[regular_ventilation_of_the_hall]', $hallDetails->regular_ventilation_of_the_hall) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[regular_ventilation_of_the_hall]', $hallDetails->regular_ventilation_of_the_hall) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">الضيافة في صناديق خاصة و مغلقة</label>
    <select name="hall[hospitality_in_special_and_closed_boxes]" class="form-control">
        <option disabled selected>الضيافة في صناديق خاصة و مغلقة</option>
        <option value="0" {{ old('hall[hospitality_in_special_and_closed_boxes]', $hallDetails->hospitality_in_special_and_closed_boxes) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[hospitality_in_special_and_closed_boxes]', $hallDetails->hospitality_in_special_and_closed_boxes) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">ادوات طعام للاستعمال مرة واحدة</label>
    <select name="hall[disposable_eating_utensils]" class="form-control">
        <option disabled selected>ادوات طعام للاستعمال مرة واحدة</option>
        <option value="0" {{ old('hall[disposable_eating_utensils]', $hallDetails->disposable_eating_utensils) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[disposable_eating_utensils]', $hallDetails->disposable_eating_utensils) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label"> تزويد طاقم الخدمة بالقفازات والأقنعة</label>
    <select name="hall[providing_the_service_staff_with_gloves_and_masks]" class="form-control">
        <option disabled selected> تزويد طاقم الخدمة بالقفازات والأقنعة</option>
        <option value="0" {{ old('hall[providing_the_service_staff_with_gloves_and_masks]', $hallDetails->providing_the_service_staff_with_gloves_and_masks) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[providing_the_service_staff_with_gloves_and_masks]', $hallDetails->providing_the_service_staff_with_gloves_and_masks) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">أجهزة قياس الحرارة عند المدخل</label>
    <select name="hall[temperature_measuring_devices_at_the_entrance]" class="form-control">
        <option disabled selected>أجهزة قياس الحرارة عند المدخل</option>
        <option value="0" {{ old('hall[temperature_measuring_devices_at_the_entrance]', $hallDetails->temperature_measuring_devices_at_the_entrance) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[temperature_measuring_devices_at_the_entrance]', $hallDetails->temperature_measuring_devices_at_the_entrance) == '1' ? 'selected' : '' }}>
            لا
        </option>
    </select>
</div>
<div class="form-group col-md-6">
    <label class="form-label">صنابير تعمل بالحساسات</label>
    <select name="hall[sensor_operated_faucets]" class="form-control">
        <option disabled selected>صنابير تعمل بالحساسات</option>
        <option value="0" {{ old('hall[sensor_operated_faucets]', $hallDetails->sensor_operated_faucets) == '0' ? 'selected' : '' }}>
            نعم
        </option>
        <option value="1" {{ old('hall[sensor_operated_faucets]', $hallDetails->sensor_operated_faucets) == '1' ? 'selected' : '' }}>لا
        </option>
    </select>
</div>
