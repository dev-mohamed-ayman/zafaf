@extends('frontend.layouts.master')
@section('content')
    <section class="offers pb-5">
        <div class="py-3 shadow" style="background-color: #c1c1c1">
            <div class="container">
                <h5 class="text-blue fw-semibold">@lang('Wedding articles')</h5>
                <p>
                    @lang('Where do you start planning your wedding? What to look for when communicating with Service Providers? Are there any legal matters I should know about the process? marriage? What are the latest wedding trends? We\'ve got it all covered for you, We\'ve interviewed the best in the wedding industry and rounded it up for you Experiences of couples who have already planned their weddings. Everything you need when Planning your wedding is on these pages!')
                </p>
            </div>
        </div>
        <div class="container py-4">
            <h5 class="text-blue fw-semibold">@lang('Wedding planning guide')</h5>
            <p>
                @lang('What do you need to organize a perfect wedding? What are the tricks that enable you to make the right decision about choosing the wedding hall, the right bride\'s dress, the invitation card, and the hospitality? How do you determine the average budget required for each of these services? What should you pay attention to when negotiating with wedding service providers? The team of experts at Zafaf.net provides you with answers to all these questions.')
            </p>
        </div>
        <div class="container">
            <div class="row">
                @foreach(\App\Models\Blog::all() as $blog)
                    <div class="col-md-4 mb-4">
                        <a href="{{route('blog', $blog->id)}}"
                           class="card rounded-5 position-relative text-decoration-none">
                            <img
                                    src="{{asset($blog->image)}}"
                                    class="card-img-top w-100"
                                    alt=""
                                    style="height: 300px"
                            />
                            <h5
                                    class="position-absolute bottom-0 w-100 text-center text-light mb-3 fw-semibold"
                            >
                                {{$blog->title}}
                            </h5>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
