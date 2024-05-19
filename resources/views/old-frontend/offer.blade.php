@extends('frontend.layouts.master')
@section('title', 'العروض')
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
            <h3 class="text-center fw-bold">@lang('Offers and services')</h3>
            <div class="offers py-5 row">
                @foreach ($offers as $offer)
                    <div class="col-xl-4 col-md-6">
                        <a href="{{ route('hall.details', $offer->hall_id) }}" class="card text-decoration-none">
                            <img src="{{asset($offer->image)}}" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title fw-bold">{{$offer->hall->name()}}</h3>
                                <p class="fw-bold text-muted">{{$offer->content()}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
