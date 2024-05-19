@extends('frontend.layouts.master')
@section('title', 'زفاف')
@section('content')
    <section>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 400px;">
                    <img src="{{ asset('frontend/images/slider-1.png') }}" class="d-block w-100 h-100" alt="...">
                </div>
                <div class="carousel-item" style="height: 400px;">
                    <img src="{{ asset('frontend/images/slider-2.png') }}" class="d-block w-100 h-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="halls py-5 bg-light">
        <div class="container pt-5">
            {{--            @if (count($halls) <= 0)--}}
            <form action="{{ route('search') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <select name="city" class="form-select">
                            <option disabled selected>@lang('City')</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->title() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 col-xl-4 mb-3">
                        <select name="type" class="form-select">
                            <option disabled selected>@lang('Type')</option>
                            <option value="halls">@lang('Halls')</option>
                            <option value="hotels">@lang('Hotels')</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-xl-4 mb-3">
                        <button type="submit"
                                class="bg-red-color fw-bold rounded h-100 border-0 text-light w-100">
                            @lang('List of service providers')
                        </button>
                    </div>
                </div>
            </form>
            {{--            @endif--}}
            <div class="row pt-5">
                @if (count($halls) >= 1)
                    <div class="col-md-3">
                        <form action="{{ route('search') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <input type="search" name="name" class="form-control"
                                           placeholder="@lang('Enter what you are looking for')">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <select name="city" class="form-select">
                                        <option disabled selected>@lang('City')</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->title() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 col-xl-12 mb-3">
                                    <select name="type" class="form-select">
                                        <option disabled selected>@lang('Type')</option>
                                        <option value="halls">@lang('Halls')</option>
                                        <option value="hotels">@lang('Hotels')</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-xl-12 mb-3">
                                    <select name="offer" class="form-select">
                                        <option disabled selected>@lang('Offers')</option>
                                        <option value="1">@lang('Yes')</option>
                                        <option value="0">@lang('No')</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-xl-12 mb-3">
                                    <button type="submit"
                                            class="bg-red-color py-2 fw-bold rounded h-100 border-0 text-light w-100">
                                        @lang('List of service providers')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                <div class="halls-container col-md-9">

                    @forelse ($halls as $hall)
                        <div class="row mb-5 border rounded-3">
                            <div class="col-md-5 mb-3 mb-md-0">
                                <img src="{{ count($hall->images) > 0 ? asset($hall->images[0]->path) : '' }}"
                                     class="w-100 h-100 object-fit-contain">
                            </div>
                            <div class="col-md-7">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h3 class="fw-bold">
                                        <a href="{{ route('hall.details', $hall->id) }}"
                                           class="text-decoration-none text-black">
                                            {{ $hall->name() }}
                                        </a>
                                    </h3>
                                    @auth()
                                        @if (auth()->user()->favorites()->where('hall_id', $hall->id)->count() >= 1)
                                            <button type="button" class="bg-transparent border-0">
                                                <i class="fas fa-heart text-danger fs-3"></i>
                                            </button>
                                        @else
                                            <a href="{{ route('favorite.show', $hall->id) }}"
                                               class="text-decoration-none">
                                                <i class="far fa-heart fs-3 text-black"></i>
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('favorite.show', $hall->id) }}" class="text-decoration-none">
                                            <i class="far fa-heart fs-3 text-black"></i>
                                        </a>
                                    @endauth
                                </div>
                                <div class="d-flex align-items-center gap-5 mt-2">
                                    @php
                                        $max = \App\Models\Rate::query()->where('hall_id', $hall->id)->select('rate')->groupBy('rate')->orderByRaw('COUNT(*) DESC')->first();
                                      
                                    @endphp

                                    <p class="m-0">
                                        @if (!$max)
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif ($max->rate == '1')
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($max->rate == '2')
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($max->rate == '3')
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($max->rate == '4')
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($max->rate == '5')
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @endif
                                        @lang('Rates')
                                        ({{ \App\Models\Rate::where('hall_id', $hall->id)->count() }})
                                    </p>
                                    <p>
                                        <i class="fa fa-city"></i>
                                        {{ $hall->city->title() }}
                                    </p>
                                </div>
                                <p class="fw-semibold">
                                    {{ Str::words($hall->description(), 35, '...') }}
                                </p>
                                <p class="fw-bold">
                                    @lang('Capacity per person') {{ $hall->size }}
                                </p>
                                <p class="fw-bold">
                                    @lang('Price per person') {{ $hall->price }} @lang('SR')
                                </p>
                            </div>
                        </div>
                    @empty
                        {{-- <h3 class="text-center fw-bold">لاتوجد قاعات</h3> --}}
                    @endforelse
                </div>
            </div>
            @if(count($offers) > 0)
                <h3 class="text-center fw-bold">@lang('Offers and services')</h3>
                <div class="offers py-5 row">
                    @foreach ($offers as $offer)
                        <div class="col-xl-4 col-md-6">
                            <a href="{{ route('hall.details', $offer->hall_id) }}" class="card text-decoration-none">
                                <img src="{{asset($offer->image)}}" class="card-img-top">
                                <div class="card-body">
                                    <h3 class="card-title fw-bold">{{$offer->hall->name()}}</h3>
                                    <p class="fw-bold text-muted">{{$offer->hall->city->title()}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(count($blogs) > 0)
                <h3 class="text-center fw-bold">@lang('Blogs')</h3>
                <div class="blog py-5">
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-xl-3 col-md-4">
                                <a href="{{route('blog', $blog->id)}}" class="card text-decoration-none">
                                    <img src="{{asset($blog->image)}}" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h4>{{$blog->title}}</h4>
                                        <p class="">{!! \Illuminate\Support\Str::words(strip_tags($blog->content), 20) !!}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    @if (!empty($popupItem))
        <div class="cover hidden"></div>
        <div class="card hidden" id="model">
            <div class="card-header">
                <a href="#" id="closeBtn">X</a>
            </div>
            <div class="card-body" style="overflow-y: auto">

                <div class="row h-100 ">
                    <div class="col-5 h-100">
                        <div class="h-100">
                            <img src="{{ asset($popupItem->images[0]->path) }}" class="w-100 h-100 object-fit-contain ">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="fw-bold">
                                <a href="{{ route('hall.details', $popupItem->id) }}"
                                   class="text-decoration-none text-black">
                                    {{ $popupItem->name() }}
                                </a>
                            </h3>
                            @auth()
                                @if (auth()->user()->favorites()->where('hall_id', $popupItem->id)->count() >= 1)
                                    <button type="button" class="bg-transparent border-0">
                                        <i class="fas fa-heart text-danger fs-3"></i>
                                    </button>
                                @else
                                    <a href="{{ route('favorite.show', $popupItem->id) }}" class="text-decoration-none">
                                        <i class="far fa-heart fs-3 text-black"></i>
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('favorite.show', $popupItem->id) }}" class="text-decoration-none">
                                    <i class="far fa-heart fs-3 text-black"></i>
                                </a>
                            @endauth
                        </div>
                        <div class="d-flex align-items-center gap-5 mt-2">
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
                        <p class="fw-semibold">
                            {{ Str::words($popupItem->description(), 35, '...') }}
                        </p>
                        <p class="fw-bold">
                            @lang('Capacity per person') {{ $popupItem->size }}
                        </p>
                        <p class="fw-bold">
                            @lang('Price per person'){{ $popupItem->price }} @lang('SR')
                        </p>
                    </div>
                </div>

            </div>
        </div>
    @endif
@endsection
