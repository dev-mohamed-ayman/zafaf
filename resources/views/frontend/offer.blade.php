@extends('frontend.layouts.master')
@section('content')
    <section class="offers py-5">
        <div class="container">
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
                                <p class="text-muted">{{$offer->content()}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
