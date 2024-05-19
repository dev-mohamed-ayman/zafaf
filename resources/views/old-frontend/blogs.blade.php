@extends('frontend.layouts.master')
@section('title', 'الالبومات')
@section('content')
    <section>
        <div>
            <img src="{{ asset('frontend/images/slider-1.png') }}" style="height: 50vh; width:100%">
        </div>
    </section>
    <section class="halls py-5 bg-light">
        <div class="container pt-5">
            <h3 class="text-center fw-bold">@lang('Blogs')</h3>
            <div class="blog py-5">
                <div class="row">
                    @foreach(\App\Models\Blog::all() as $blog)
                        <div class="col-xl-3 col-md-4">
                            <a href="{{route('blog', $blog->id)}}" class="card text-decoration-none">
                                <img src="{{asset($blog->image)}}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h4>{{$blog->title}}</h4>
                                    <p class="">{!! \Illuminate\Support\Str::words(strip_tags($blog->content), 20) !!}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
