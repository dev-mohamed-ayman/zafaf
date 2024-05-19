@extends('frontend.layouts.master')
@section('title', 'من نحن')
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
    <section class="hall-details bg-light">

        <div class="bg-main-color py-4 my-2 text-center">
            <div class="container rounded bg-light py-4 px-4">
                <h3 class="fw-bold">who are we </h3>
                <p class="d-block">{{ \App\Models\Setting::first()->about }}</p>
            </div>
        </div>
    </section>
@endsection
