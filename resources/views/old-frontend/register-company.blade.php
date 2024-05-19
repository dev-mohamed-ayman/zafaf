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
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>@lang('Request a corporate account')</title>
</head>

<body dir="rtl" class="py-5">
    {{-- <div id="loader"><img class="img-loader" src="{{asset('frontend/images/logo.png')}}"></div> --}}
    <div class="auth py-5">
        <div class="py-5">
            <img src="{{ asset('frontend/images/logo.png') }}" alt="Logo">
            <form action="{{ route('register.company.post') }}" method="post">
                @csrf
                <input type="text" name="name" class="py-3 px-4 fw-bold mt-4" placeholder="@lang('Name')">
                <input type="email" name="email" class="py-3 px-4 fw-bold mt-4" placeholder="@lang('Email')">
                <input type="number" name="phone" class="py-3 px-4 fw-bold mt-4" placeholder="@lang('Phone')">
                <select name="city" class="py-3 px-4 mt-4 fw-bold">
                    <option selected disabled>@lang('City')</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->title() }}</option>
                    @endforeach
                </select>
                <input type="password" name="password" class="py-3 px-4 mt-4 fw-bold" placeholder="@lang('Password')">
                <input type="password" name="password_confirmation" class="py-3 px-4 mt-4 fw-bold"
                    placeholder="@lang('confirm password')">
                <button type="submit"
                    class="px-5 py-3 border-0 bg-red-color text-light d-block mx-auto fw-bold rounded-pill mt-4">@lang('Signup')</button>
            </form>
            <a href="{{ route('login') }}"
                class="text-center mt-2 d-block text-main-color-2 text-decoration-none fw-bold">@lang('Have an account Register')</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options.progressBar = true;
        window.addEventListener('load', function() {
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
