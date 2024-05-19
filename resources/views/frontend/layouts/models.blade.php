<div class="models">
    <div class="login p-4">
        <div class="close-model">
            <i class="fa fa-close"></i>
        </div>
        <img src="{{asset('frontend/images/logo.png')}}" class="logo mx-auto d-block mb-4" alt="">
        <form action="{{route('login.post')}}" method="post" dir="ltr">
            @csrf
            <div class="inp-group position-relative mb-4">
                <input type="email" name="email" placeholder="البريد الالكتروني">
                <i class="fa fa-mail-bulk position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="password" name="password" placeholder="كلمة السر">
                <i class="fa fa-lock position-absolute"></i>
            </div>
            <button type="submit" class="main-btn w-100 rounded-pill">تسجيل الدخول</button>
        </form>
    </div>
    <div class="register p-4">
        <div class="close-model">
            <i class="fa fa-close"></i>
        </div>
        <img src="{{asset('frontend/images/logo.png')}}" class="logo mx-auto d-block mb-4" alt="">
        <form action="{{route('register.post')}}" method="post" dir="ltr">
            @csrf
            <div class="inp-group position-relative mb-4">
                <input type="name" name="name" placeholder="الاسم الاول والاخير">
                <i class="fa fa-user position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="email" name="email" placeholder="البريد الالكتروني">
                <i class="fa fa-mail-bulk position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="tel" name="phone" placeholder="رقم الهاتف">
                <i class="fa fa-phone position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <select name="city">
                    <option selected disabled>اختر مدينة</option>
                    @foreach(\App\Models\City::all() as $city)
                        <option value="{{$city->id}}">{{$city->title()}}</option>
                    @endforeach
                </select>
                <i class="fa fa-city position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="password" name="password" placeholder="كلمة السر">
                <i class="fa fa-lock position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="password" name="password_confirmation" placeholder="تتاكيد كلمة السر كلمة السر">
                <i class="fa fa-lock position-absolute"></i>
            </div>
            <button type="submit" class="main-btn w-100 rounded-pill">انشاء حساب جديد</button>
        </form>
    </div>
    <div class="company p-4">
        <div class="close-model">
            <i class="fa fa-close"></i>
        </div>
        <img src="{{asset('frontend/images/logo.png')}}" class="logo mx-auto d-block mb-4" alt="">
        <form action="{{ route('register.company.post') }}" method="post" dir="ltr">
            @csrf
            <div class="inp-group position-relative mb-4">
                <input type="name" name="name" placeholder="الاسم الاول والاخير">
                <i class="fa fa-user position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="email" name="email" placeholder="البريد الالكتروني">
                <i class="fa fa-mail-bulk position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="tel" name="phone" placeholder="رقم الهاتف">
                <i class="fa fa-phone position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <select name="city">
                    <option selected disabled>اختر مدينة</option>
                    @foreach(\App\Models\City::all() as $city)
                        <option value="{{$city->id}}">{{$city->title()}}</option>
                    @endforeach
                </select>
                <i class="fa fa-city position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="password" name="password" placeholder="كلمة السر">
                <i class="fa fa-lock position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="password" name="password_confirmation" placeholder="تتاكيد كلمة السر كلمة السر">
                <i class="fa fa-lock position-absolute"></i>
            </div>
            <button type="submit" class="main-btn w-100 rounded-pill">طلب حساب جديد</button>
        </form>
    </div>
    @if (!empty($popupItem))
        <div id="model" class="model p-4">
            <div class="close-model">
                <i class="fa fa-close"></i>
            </div>
            <div class="row">
                <div class="col-md-4 h-100">
                    <img src="{{ asset($popupItem->images[0]->path) }}" class="w-100 h-100 object-fit-contain">
                </div>
                <div class="col-md-8 h-100">
                    <div class="d-flex align-items-center justify-content-center">
                        <h3 class="fw-bold">
                            <a href="{{ route('hall.details', $popupItem->id) }}"
                               class="text-decoration-none text-black">
                                {{ $popupItem->name() }}
                            </a>
                        </h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-center gap-5 mt-2">
                        @php
                            $arr1 = \App\Models\Rate::where('hall_id', $popupItem->id)
                                ->where('rate', '1')
                                ->count();
                            $arr2 = \App\Models\Rate::where('hall_id', $popupItem->id)
                                ->where('rate', '2')
                                ->count();
                            $arr3 = \App\Models\Rate::where('hall_id', $popupItem->id)
                                ->where('rate', '3')
                                ->count();
                            $arr4 = \App\Models\Rate::where('hall_id', $popupItem->id)
                                ->where('rate', '4')
                                ->count();
                            $arr5 = \App\Models\Rate::where('hall_id', $popupItem->id)
                                ->where('rate', '5')
                                ->count();
                        @endphp

                        <p>
                            @if (count($popupItem->rates) < 1)
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                            @elseif ($arr1 > $arr2 || $arr1 > $arr3 || $arr1 > $arr4 || $arr1 > $arr5)
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="fas fa-star text-warning"></i>
                            @elseif ($arr2 > $arr1 || $arr2 > $arr3 || $arr2 > $arr4 || $arr2 > $arr5)
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            @elseif ($arr3 > $arr2 || $arr3 > $arr1 || $arr3 > $arr4 || $arr3 > $arr5)
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            @elseif ($arr4 > $arr2 || $arr4 > $arr3 || $arr4 > $arr1 || $arr4 > $arr5)
                                <i class="far fa-star"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                            @elseif ($arr5 > $arr2 || $arr5 > $arr3 || $arr5 > $arr4 || $arr5 > $arr1)
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="fas fa-star text-warning"></i>
                            @endif
                            @lang('Rates')
                            ({{ \App\Models\Rate::where('hall_id', $popupItem->id)->count() }})
                        </p>
                        <p>
                            <i class="fa fa-city"></i>
                            {{ $popupItem->city->title() }}
                        </p>
                    </div>
                    <p class="fw-semibold text-center">
                        {{ Str::words($popupItem->description(), 35, '...') }}
                    </p>
                    <p class="fw-bold text-center">
                        @lang('Capacity per person') {{ $popupItem->size }}
                    </p>
                    <p class="fw-bold text-center">
                        @lang('Price per person'){{ $popupItem->price }} @lang('SR')
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
