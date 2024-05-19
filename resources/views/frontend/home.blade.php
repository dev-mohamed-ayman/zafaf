@extends('frontend.layouts.master')
@section('content')
    <div class="home py-5">
        <div class="container py-3">
            <div class="filter-box p-4 bg-light text-center text-lg-start">
                <h2 class="mb-3">
                    @lang('Planning your wedding')
                    <br/>
                    @lang('Starts now !')
                </h2>
                <p class="m-0">@lang('The largest guide to all wedding services in')<br/>
                <h3 class="fw-semibold m-0">
                    @if(session('country') == 'EG')
                    @lang('Egypt')
                    @elseif(session('country') == 'AE')
                    @lang('The UAE')
                    @else
                    @lang('Saudi Arabia')
                    @endif

                </h3>
                </p>
                <form action="{{ route('search') }}" method="get"
                      class="d-flex align-items-center justify-content-center flex-column flex-lg-row gap-3">
                    <div class="select position-relative w-100 rounded-pill">
                        <span class="position-absolute">@lang('Enter what you are looking for')</span>
                        <select name="type" class="rounded-pill">
                            <option selected disabled>@lang('Select')</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->title() }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="select position-relative w-100 rounded-pill">
                        <span class="position-absolute">@lang('Type')</span>
                        <select name="type" class="rounded-pill">
                            <option disabled selected>@lang('Select')</option>
                            <option value="halls">@lang('Halls')</option>
                            <option value="hotels">@lang('Hotels')</option>
                        </select>
                    </div>
                    <button type="submit" class="main-btn w-100">@lang('List of service providers')</button>
                </form>
            </div>
        </div>
    </div>
    @if(count($offers) > 0)
        <div class="offers py-5">
            <div class="container">
                <h2 class="text-black-50 fw-bold text-center mb-5">العروض والخدمات</h2>
                <div class="row">
                    @foreach ($offers as $offer)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img
                                    src="{{asset($offer->image)}}"
                                    class="card-img-top w-100 h-100 object-fit-contain"
                                    alt=""
                                />
                                <div class="card-body">
                                    <a href="{{ route('hall.details', $offer->hall_id) }}" class="text-decoration-none">
                                        <h4 class="fw-semibold text-blue text-center mb-3">
                                            {{$offer->hall->name()}}
                                        </h4>
                                    </a>
                                    <p class="text-muted">حجز صالة زفاف لمدة يومين فقط ب 1000</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
    @endif
    @if(count($blogs) > 0)
        <div class="blogs py-5">
            <div class="container">
                <h2 class="text-black-50 fw-bold text-center mb-5">المقالات</h2>
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-md-4 mb-4">
                            <a href="{{route('blog', $blog->id)}}"
                               class="card rounded-5 position-relative text-decoration-none">
                                <img
                                    src="{{asset($blog->image)}}"
                                    class="card-img-top w-100"
                                    alt=""
                                    style="height: 300px"
                                />
                                <h5
                                    class="position-absolute bottom-0 w-100 text-center text-light mb-3 fw-semibold"
                                >
                                    {{$blog->title}}
                                </h5>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
