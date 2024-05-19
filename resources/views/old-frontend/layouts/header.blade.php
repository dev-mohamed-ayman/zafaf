<nav class="navbar navbar-expand-lg bg-main-color">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ !empty(\App\Models\Setting::query()->first()->logo) ? asset(\App\Models\Setting::query()->first()->logo) : asset('frontend/images/logo.png') }}" style="height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['home']) }} fw-bold" href="{{ route('home') }}">@lang('Home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['offer']) }} fw-bold" href="{{ route('offer') }}">@lang('Offers')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['blogs']) }} fw-bold" href="{{ route('blogs') }}">@lang('Blogs')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['albums']) }} fw-bold" href="{{ route('albums') }}">@lang('Albums')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ setSidebarActive(['hall.plan']) }} fw-bold"
                       href="{{ route('hall.plan') }}">@lang('Wedding Planning Department')</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        {{ app()->getLocale() == 'ar' ? 'العربية' : 'English' }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ setSidebarActive(['favorite.*']) }} fw-bold"
                           href="{{ route('favorite.index') }}">@lang('Favorite')</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">@lang('Logout')</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ setSidebarActive(['login']) }} fw-bold" href="{{ route('login') }}">@lang('Login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ setSidebarActive(['register']) }} fw-bold"
                           href="{{ route('register') }}">@lang('Signup')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ setSidebarActive(['register.company']) }} fw-bold"
                           href="{{ route('register.company') }}">@lang('Companies')</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
