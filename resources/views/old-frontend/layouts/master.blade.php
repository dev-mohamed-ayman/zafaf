<!doctype html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
          rel="stylesheet">
    <title>@yield('title')</title>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=2f939b64-31cc-444e-8c2d-ae66c74d71e7&lang=en_US"
            type="text/javascript"></script>
{{--    <script src="https://api-maps.yandex.ru/v3/?apikey=2f939b64-31cc-444e-8c2d-ae66c74d71e7&lang=en_US" type="text/javascript"></script>--}}
</head>

<body dir="rtl" class="bg-light">
<div id="loader"><img class="img-loader" src="{{ asset('frontend/images/logo.png') }}"></div>

{{-- Start Navbar --}}
@include('frontend.layouts.header')
{{-- End Navbar --}}

{{-- Start Content --}}
@yield('content')
{{-- End Content --}}

{{-- Start Footer --}}
<footer class="bg-main-color">
    <div class="container py-5">
        <ul class="p-0 m-0">
            <li>
                <a href="{{ route('home') }}" style="width: 80px">
                    <img src="{{ asset('frontend/images/logo.png') }}" class="w-100 h-100 object-fit-contain"></a>
            </li>
            <li>
                <a href="{{ route('home') }}">@lang('Home')</a>
            </li>
            <li>
                <a href="{{ route('home') }}">@lang('Favorite')</a>
            </li>
            <li>
                <a href="{{ route('about') }}">@lang('who are we')</a>
            </li>
            <li>
                <a href="{{ route('terms') }}">@lang('privacy policy')</a>
            </li>
            <li>
                <a href="{{ route('home') }}">@lang('Login')</a>
            </li>
        </ul>
    </div>
    <div class="bg-main-color-2 py-4">
        <p class="text-center m-0 fw-bold">@lang('all rights are save')</p>
    </div>
</footer>
{{-- End Footer --}}



<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
{{-- <script src="{{asset('frontend/js/all.min.js')}}"></script> --}}
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<!-- Toastr -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{ asset('frontend/js/main.js') }}"></script>

<script>
    toastr.options.progressBar = true;

    window.addEventListener('load', function () {
        document.getElementById('loader').classList.add('loader--hidden')
    })
</script>

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
</body>

</html>
