@extends('frontend.layouts.master')
@section('title', 'زفاف')
@section('content')
    <section>
        <div>
            <img src="{{ asset('frontend/images/slider-1.png') }}" style="height: 50vh; width:100%">
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">{{$blog->title}}</h2>
            <img src="{{asset($blog->image)}}" class="mx-auto w-100">
            <div class="content">{!! $blog->content !!}</div>
        </div>
    </section>
@endsection
