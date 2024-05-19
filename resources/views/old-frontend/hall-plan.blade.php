@extends('frontend.layouts.master')
@section('title', 'قسم تخطيط حفلات الزفاف')
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
            <div class="bg-main-color rounded-3 py-4 px-3">
                <form action="{{ route('make-order.store') }}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="@lang('Name')"
                        class="w-100 p-3 mb-3 fw-bold border-0 rounded-pill" style="outline: none">
                    <input type="email" name="email" placeholder="@lang('Email')"
                        class="w-100 p-3 mb-3 fw-bold border-0 rounded-pill" style="outline: none">
                    <input type="nubmer" name="phone" placeholder="@lang('Phone')"
                        class="w-100 p-3 mb-3 fw-bold border-0 rounded-pill" style="outline: none">
                    <input type="date" name="date" placeholder="@lang('Wedding date')"
                        class="w-100 p-3 mb-3 fw-bold border-0 rounded-pill" style="outline: none">
                    <input type="nubmer" name="count" placeholder="@lang('Number of invitees')"
                        class="w-100 p-3 mb-3 fw-bold border-0 rounded-pill" style="outline: none">
                    <input type="nubmer" name="price" placeholder="@lang('Budget')"
                        class="w-100 p-3 mb-3 fw-bold border-0 rounded-pill" style="outline: none">
                    <textarea name="note" placeholder="@lang('Leave your message')" rows="4" class="w-100 p-3 mb-3 fw-bold border-0 rounded"
                        style="outline: none"></textarea>
                    <button type="submit"
                        class="bg-red-color py-3 px-5 border-0 rounded-pill text-light mx-auto d-block">@lang('Request a price')</button>
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection
