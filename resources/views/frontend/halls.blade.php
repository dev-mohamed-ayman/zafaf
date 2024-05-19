@extends('frontend.layouts.master')
@section('content')
    <section class="halls py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 p-3 sidebar">
                    <div class="inp-group position-relative mb-4">
                        <form action="{{ route('search') }}" method="get">
                            <select name="city" class="mb-3">
                                <option selected disabled>@lang('City')</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->title() }}</option>
                                @endforeach
                            </select>
                            <select name="type" class="mb-3">
                                <option selected disabled>@lang('Type')</option>
                                <option value="halls">@lang('Halls')</option>
                                <option value="hotels">@lang('Hotels')</option>
                            </select>
                            <select name="offer" class="mb-3">
                                <option selected disabled>@lang('Offers')</option>
                                <option value="1">@lang('Yes')</option>
                                <option value="0">@lang('No')</option>
                            </select>
                            <button
                                type="submit"
                                class="main-btn d-block w-100 rounded-pill"
                            >
                                @lang('List of service providers')
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 p-3 pt-0 content">
                    <div class="p-3 shadow rounded-3">
                        <h3 class="fw-semibold m-0 text-blue">@lang('Hotels') {{count($halls)}}</h3>
                    </div>
                    @foreach($halls as $hall)
                        <div class="container-box p-3 border my-4 rounded-5">
                            <div class="row">
                                <div class="col-md-5">
                                    <img
                                        src="{{ count($hall->images) > 0 ? asset($hall->images[0]->path) : '' }}"
                                        class="w-100 h-100 object-fit-contain"
                                        alt=""
                                    />
                                </div>
                                <div class="col-md-7 p-0 text-muted">
                                    <a href="{{ route('hall.details', $hall->id) }}"
                                       class="text-decoration-none text-black">
                                        <h3 class="fw-semibold text-blue">{{ $hall->name() }}</h3>
                                    </a>
                                    <div class="d-flex align-items-center justify-content-around gap-3 mt-3">
                    <span>
                      <i class="fa fa-star text-blue fs-4"></i>
                      {{\App\Models\Rate::query()->where('hall_id', $hall->id)->avg('rate') ? \App\Models\Rate::query()->where('hall_id', $hall->id)->avg('rate') : '0'}}
                    </span>
                                        <span>التعليقات ({{ \App\Models\Rate::where('hall_id', $hall->id)->count() }})</span>
                                        <span>
                      <i class="fa fa-location-pin fs-4 text-blue"></i>
                      {{ $hall->city->title() }}
                    </span>
                                    </div>
                                    <small class="text-muted mt-3 d-block">
                                        {{ strip_tags(Str::words($hall->description(), 45, '...')) }}
                                    </small>
                                    <div class="d-flex align-items-center justify-content-around gap-3 mt-3">
                                        <p class="text-muted">شخص {{ $hall->size }}</p>
                                        <p class="text-muted">{{ $hall->price }} ريال</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
