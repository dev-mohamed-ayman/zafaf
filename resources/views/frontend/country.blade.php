<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.rtl.min.css') }}"/>
    <!-- Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"/>
    <title>Document</title>
</head>

<body>


<header>
    <nav class="navbar navbar-expand-lg py-0 py-lg-2">
        <div class="container">
            <button style="outline: none" class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target=".navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand d-block text-center mb-3 mb-lg-0" href="#">
                <img src="{{ asset('frontend/images/logo.png') }}" class="logo" alt=""/>
            </a>
            <div class="collapse navbar-collapse navbarSupportedContent" id="navbarSupportedContent">
                <div class="navbar-nav d-flex align-items-center justify-content-end gap-3 w-100">
                    @auth()
                        <a href="{{ route('logout') }}" class="main-btn text-decoration-none">@lang('Logout')</a>
                    @else
                        <button type="button" id="company-btn"
                                class="company-btn mb-3 mb-lg-0 d-flex align-items-center justify-content-center gap-1">
                            @lang('Companies')
                            <i class="fa fa-briefcase"></i>
                        </button>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="{{ route('set-country', 'AE') }}" class="card text-decoration-none">
                    <img src="https://www.zafaf.net/uploads/settings/small/gZVJBR3jJ2DjbSDlLmQLEFd35eg6OZ0Q.jpg"
                         class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">@lang('The United Arab Emirates')</h5>
                        <hr class="m-0">
                        <p class="card-text mt-2">
                            @lang('Plan your wedding through Zafaf.net and make preparing for your wedding day an enjoyable and stress-free journey, because you will find at your fingertips hundreds of wedding companies that you can communicate with with ease.')
                        </p>
                    </div>

                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ route('set-country', 'EG') }}" class="card text-decoration-none">
                    <img src="https://www.zafaf.net/uploads/settings/small/loRObBr1BTWLUVZaFNxZRdLlMiHnZCdX.jpg"
                         class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">@lang('Egypt')</h5>
                        <hr class="m-0">
                        <p class="card-text mt-2">
                            @lang('We start with you from the ground up in the world of wedding planning at Azaf.net, with all the wedding services you can think of for your joy, and we accompany you through your browsing of articles and photo albums!')
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ route('set-country', 'SA') }}" class="card text-decoration-none">
                    <img src="https://www.zafaf.net/uploads/settings/small/NGF5sXbxcbPk2U4RIeaOGC4UJ8cSeip5.jpg"
                         class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">@lang('Kingdom of Saudi Arabia')</h5>
                        <hr class="m-0">
                        <p class="card-text mt-2">
                            @lang('We understand the privacy of Saudi society and its keenness to pay attention to wedding services and the accompanying ceremonies that are not devoid of luxury and elegance!')
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="models">
    <div class="company p-4">
        <div class="close-model">
            <i class="fa fa-close"></i>
        </div>
        <img src="{{ asset('frontend/images/logo.png') }}" class="logo mx-auto d-block mb-4" alt="">
        <form action="{{ route('register.company.post') }}" method="post" dir="ltr">
            @csrf
            <div class="inp-group position-relative mb-4">
                <input type="name" name="name" placeholder="@lang('Name')">
                <i class="fa fa-user position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="email" name="email" placeholder="@lang('Email')">
                <i class="fa fa-mail-bulk position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="tel" name="phone" placeholder="@lang('Phone')">
                <i class="fa fa-phone position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <select name="city">
                    <option selected disabled>@lang('City')</option>
                    @foreach (\App\Models\City::all() as $city)
                        <option value="{{ $city->id }}">{{ $city->title() }}</option>
                    @endforeach
                </select>
                <i class="fa fa-city position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="password" name="password" placeholder="@lang('Password')">
                <i class="fa fa-lock position-absolute"></i>
            </div>
            <div class="inp-group position-relative mb-4">
                <input type="password" name="password_confirmation" placeholder="@lang('Password Confirmation')">
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

<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
{{-- <script src="{{ asset('frontend/js/main.js') }}"></script> --}}
<!-- Toastr -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@if (session('success'))
    <script>
        toastr.success('{{ session('success') }}')
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}')
        </script>
    @endforeach
@endif

    <script>
        let models = document.querySelector(".models");
        let closeModel = document.querySelectorAll(".models .close-model");
        let companyBnt = document.getElementById("company-btn");
        let companyModel = document.querySelector(".models .company");

        setInterval(function() {
            model.classList.add("show");
            models.classList.add("show");
        }, 300000);

        closeModel.forEach((e) => {
            e.addEventListener("click", () => {
                models.classList.remove("show");
                companyModel.classList.remove("show");
                model.classList.remove("show");
            });
        });

        companyBnt.addEventListener("click", () => {
            companyModel.classList.add("show");
            models.classList.add("show");
        });
    </script>
</body>

</html>
