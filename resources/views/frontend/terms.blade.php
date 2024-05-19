@extends('frontend.layouts.master')
@section('title', 'من نحن')
@section('content')
    <section class="hall-details bg-light">
        <div class="bg-main-color py-4 my-2 text-center">
            <div class="container rounded bg-light py-4 px-4">
                <h3 class="fw-bold">@lang('Terms')</h3>
                <p class="d-block">{!!  \App\Models\Setting::first()->term !!}</p>
            </div>
        </div>
    </section>
@endsection
