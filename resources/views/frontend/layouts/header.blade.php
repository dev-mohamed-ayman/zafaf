<header>
    <nav class="navbar navbar-expand-lg py-0 py-lg-2">
        <div class="container">
            <button style="outline: none" class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target=".navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand d-block text-center mb-3 mb-lg-0" href="#">
                <img src="{{asset('frontend/images/logo.png')}}" class="logo" alt=""/>
            </a>
            <div class="collapse navbar-collapse navbarSupportedContent" id="navbarSupportedContent">
                <form action="{{route('search')}}" class="d-flex mx-auto form-search px-3 mb-3 mb-lg-0" role="search"
                      method="get">
                    <div class="div-search border rounded-pill">
                        <input class="input-search rounded-end-pill rounded-start-pill border-0 ps-3 py-2 w-100"
                               type="search" name="name" placeholder="@lang('Enter what you are looking for')" aria-label="Search"/>
                        <button
                            class="btn-search h-100 px-4 rounded-end-pill border-0 bg-transparent border-start rounded-start"
                            type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="navbar-nav d-flex align-items-center justify-content-center gap-3">
                    @auth()
                        <a href="{{ route('logout') }}" class="main-btn text-decoration-none">@lang('Logout')</a>
                    @else
                        <button type="button" id="login-btn" class="main-btn">@lang('Login')</button>
                        <button type="button" id="register-btn" class="register-btn">@lang('Signup')</button>
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
    <nav class="nav-bottom py-3 shadow navbarSupportedContent collapse d-lg-block">
        <div class="container">
            <ul class="flex-column flex-lg-row p-0">
                <li class="{{ setSidebarActive(['home']) }}">
                    <a href="{{route('home')}}">@lang('Home')</a>
                </li>
                <li class="{{ setSidebarActive(['offer']) }}">
                    <a href="{{route('offer')}}">@lang('Offers')</a>
                </li>
                <li class="{{ setSidebarActive(['blogs']) }}">
                    <a href="{{route('blogs')}}">@lang('Blogs')</a>
                </li>
                <li class="{{ setSidebarActive(['hall.plan']) }}">
                    <a href="{{route('hall.plan')}}">@lang('Wedding Planning Department')</a>
                </li>
                <li class="{{ setSidebarActive(['about']) }}">
                    <a href="{{route('about')}}">@lang('About')</a>
                </li>
                <li class="{{ setSidebarActive(['terms']) }}">
                    <a href="{{route('terms')}}">@lang('Terms')</a>
                </li>

                <li class="">
                    <a href="{{LaravelLocalization::getLocalizedURL(app()->getLocale() == 'ar' ? 'en' : 'ar', null, [], true)}}">
                        @if(app()->getLocale() == 'ar')
                            English
                        @else
                            العربية
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
