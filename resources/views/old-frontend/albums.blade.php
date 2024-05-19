@extends('frontend.layouts.master')
@section('title', 'الالبومات')
@section('content')
    <style>
        button.slide-images.carousel-control-next,
        button.slide-images.carousel-control-prev {
            height: 40px;
            top: 50%;
            transform: translateY(-50%);
            background-color: #eeeeeeb8;
            width: 40px;
            border-radius: 51%;
        }
        button.slide-images.carousel-control-next {
            right: 5px;
        }
        button.slide-images.carousel-control-prev {
            left: 5px;
        }
    </style>
    <section>
        <div>
            <img src="{{ asset('frontend/images/slider-1.png') }}" style="height: 50vh; width:100%">
        </div>
    </section>
    <section class="halls py-5 bg-light">
        <div class="container pt-5">
            @foreach($albums as $album)
                <div class="bg-main-color rounded-3 py-4 px-3 row mb-4">
                    <div class="col-md-6">
                        <h3 class="fw-bold mb-4">{{$album->title}}</h3>
                        <b>{!! $album->content !!}</b>
                        <a href="{{route('hall.details', $album->hall_id)}}"
                           class="bg-red-color fw-bold rounded py-2 mt-4 d-block text-decoration-none text-center border-0 text-light w-100">
                            @lang('List of service providers')
                        </a>
                    </div>
                    <div class="col-md-6">
                        {{--                        <img src="{{asset($album->images[0]->path)}}" class="w-100 h-00 object-fit-contain">--}}
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($album->images as $image)
                                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}"  style="height: 420px !important;">
                                        <img src="{{ asset($image->path) }}" class="d-block w-100 h-100 object-fit-contain" alt="...">
                                    </div>
                                @endforeach
                            </div>
                            <button class="slide-images carousel-control-prev"
                                    type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" style="background-image: none"
                                          aria-hidden="true">
                                        <i class="fa fa-chevron-left text-dark fw-bold fs-3 "></i>
                                    </span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="slide-images carousel-control-next"
                                    type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" style="background-image: none"
                                          aria-hidden="true">
                                        <i class="fa fa-chevron-right text-dark fw-bold fs-3    "></i>
                                    </span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </section>
@endsection
