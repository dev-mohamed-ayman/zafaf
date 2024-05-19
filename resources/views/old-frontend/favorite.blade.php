@extends('frontend.layouts.master')
@section('title', 'المفضله')
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
        <div class="halls-container container pt-5">
            @forelse ($halls as $hall)
                <div class="row mb-5">
                    <div class="col-md-5 mb-3 mb-md-0">
                        <img src="{{ asset(!empty($hall->images) ? $hall->images[0]->path : '') }}"
                            class="w-100 h-100 object-fit-contain">
                    </div>
                    <div class="col-md-7">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="fw-bold">
                                <a href="{{ route('hall.details', $hall->id) }}" class="text-decoration-none text-black">
                                    {{ $hall->name() }}
                                </a>
                            </h3>
                            <a href="#" class="text-dark">
                                <i class="far fa-heart fs-3"></i>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-5 mt-2">
                            <p>
                                <i class="fas fa-star text-warning"></i>
                                التقييمات
                                (9)
                            </p>
                            <p>
                                <i class="fa fa-city"></i>
                                {{ $hall->city->title() }}
                            </p>
                        </div>
                        <p class="fw-semibold">
                            {{ $hall->description() }}
                        </p>
                        <p class="fw-bold">
                            سعة شخص {{ $hall->size }}
                        </p>
                        <p class="fw-bold">
                            سعر {{ $hall->price }} ريال
                        </p>
                        <form action="{{ route('favorite.destroy', $hall->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">ازاله من المفضله</button>
                        </form>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </section>
@endsection
