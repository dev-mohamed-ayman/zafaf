@extends('frontend.layouts.master')
@section('content')
    <div class="blog py-5">
        <div class="container">
            <h2 class="text-black-50 fw-bold text-center mb-5">{{$blog->title}}</h2>
            <img src="{{asset($blog->image)}}" class="mx-auto w-100">
            <div class="content">{!! $blog->content !!}</div>
        </div>
    </div>
@endsection
