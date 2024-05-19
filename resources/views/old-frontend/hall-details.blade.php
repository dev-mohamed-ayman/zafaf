@extends('frontend.layouts.master')
@section('title', 'زفاف')
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
    <section class="hall-details bg-light">
        <div class="bg-main-color py-5">
            <div class="container bg-main-color">
                <h3>{{ $hall->name() }}</h3>
                <div class="d-flex align-items-center gap-4 mt-4">
                    <p class="d-flex align-items-center gap-2 m-0">
                        <i class="fas fa-phone"></i>
                        <span id="number" data-id="{{ $hall->id }}" class="d-block text-truncate"
                              style="width: 60px;cursor: pointer; transition: .4s">
                            {{ $hall->phone }}
                        </span>
                    </p>
                    <a href="https://wa.me/{{ $hall->whatsapp }}"
                       class="d-flex align-items-center gap-2 text-decoration-none text-black">
                        <i class="fa-brands fa-whatsapp"></i>
                        {{ $hall->whatsapp }}
                    </a>
                    <p class="d-flex align-items-center gap-2 m-0">
                        <i class="fas fa-location-pin"></i>
                        <span class="d-block">
                            {{ $hall->address }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row py-5">
                <div class="col-md-8">
                    <div class="bg-main-color rounded-3 pb-4">
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($hall->images as $image)
                                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}"
                                         style="height: 420px !important;">

                                        @if (pathinfo($image->path)['extension'] == 'mp4' ||
                                                pathinfo($image->path)['extension'] == 'mov' ||
                                                pathinfo($image->path)['extension'] == 'avi' ||
                                                pathinfo($image->path)['extension'] == 'wmv' ||
                                                pathinfo($image->path)['extension'] == 'webm' ||
                                                pathinfo($image->path)['extension'] == 'flv' ||
                                                pathinfo($image->path)['extension'] == 'avchd')
                                            <video src="{{ asset($image->path) }}"
                                                   class="w-100 h-100 object-fit-contain "
                                                   controls loop></video>
                                        @else
                                            <img src="{{ asset($image->path) }}"
                                                 class="d-block w-100 h-100 object-fit-contain">
                                        @endif

                                    </div>
                                @endforeach
                            </div>
                            @if (count($hall->images) > 1)
                                <button data-id="{{ $hall->id }}" class="slide-images carousel-control-prev"
                                        type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" style="background-image: none"
                                          aria-hidden="true">
                                        <i class="fa fa-chevron-left text-dark fw-bold fs-3 "></i>
                                    </span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button data-id="{{ $hall->id }}" class="slide-images carousel-control-next"
                                        type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" style="background-image: none"
                                          aria-hidden="true">
                                        <i class="fa fa-chevron-right text-dark fw-bold fs-3    "></i>
                                    </span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                        <div class="d-flex align-items-center gap-5 mt-4 px-3">
                            {{--                            @dd(\App\Models\Rate::query()->where('hall_id', $hall->id)->max('rate'))--}}
                             @php
                                        $max = \App\Models\Rate::query()->where('hall_id', $hall->id)->select('rate')->groupBy('rate')->orderByRaw('COUNT(*) DESC')->first();

                                    @endphp

                                    <p class="m-0">
                                        @if (!$max)
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        @elseif ($max->rate == '1')
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($max->rate == '2')
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($max->rate == '3')
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($max->rate == '4')
                                            <i class="far fa-star"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($max->rate == '5')
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @endif
                                        @lang('Rates')
                                        ({{ \App\Models\Rate::where('hall_id', $hall->id)->count() }})
                                    </p>
                            <p class="m-0">
                                <i class="fa fa-city"></i>
                                {{ $hall->city->title() }}
                            </p>
                            @auth()
                                @if (auth()->user()->favorites()->where('hall_id', $hall->id)->count() >= 1)
                                    <button type="button" class="bg-transparent border-0">
                                        <i class="fas fa-heart text-danger fs-3"></i>
                                    </button>
                                @else
                                    <form id="favorite" action="{{ route('favorite.store') }}" method="post"
                                          class="d-none">
                                        @csrf
                                        <input type="hidden" name="hall_id" value="{{ $hall->id }}" form="favorite">
                                    </form>
                                    <button type="submit" form="favorite" class="bg-transparent border-0">
                                        <i class="far fa-heart fs-3"></i>
                                    </button>
                                @endif
                            @else
                                <form id="favorite" action="{{ route('favorite.store') }}" method="post" class="d-none">
                                    @csrf
                                    <input type="hidden" name="hall_id" value="{{ $hall->id }}" form="favorite">
                                </form>
                                <button type="submit" form="favorite" class="bg-transparent border-0">
                                    <i class="far fa-heart fs-3"></i>
                                </button>
                            @endauth
                        </div>
                        <hr>
                        <form action="{{ route('rate', $hall->id) }}" method="get">
                            @csrf
                            <p class="px-3">@lang('Rate'): <span dir="ltr" class="star-rating">
                                    <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" name="rate" id="rate-1" value="1">
                                    <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" name="rate" id="rate-2" value="2">
                                    <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" name="rate" id="rate-3" value="3">
                                    <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" name="rate" id="rate-4" value="4">
                                    <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" name="rate" id="rate-5" value="5">
                                </span>
                                <textarea name="comment" class="form-control bg-transparent border mt-2 border-black"
                                          placeholder="تعليق"></textarea>
                                <button type="submit"
                                        class="bg-red-color py-2 mt-2 px-5 border-0 rounded-3 text-light mx-auto d-block">
                                    اضافة
                                </button>
                            </p>
                        </form>
                        <hr>
                        <p class="px-3">
                            {{ $hall->description() }}
                        </p>
                        <hr>
                        <p class="px-3">
                            @lang('Capacity per person') {{ $hall->size }}
                        </p>
                        <hr>
                        <p class="px-3">
                            @lang('Price per person') {{ $hall->price }} @lang('SR')
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
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
                            <textarea name="note" placeholder="@lang('Leave your message')" rows="4"
                                      class="w-100 p-3 mb-3 fw-bold border-0 rounded"
                                      style="outline: none"></textarea>
                            <input type="hidden" name="hall_id" value="{{ $hall->id }}">
                            <button type="submit"
                                    class="bg-red-color py-3 px-5 border-0 rounded-pill text-light mx-auto d-block">@lang('Request a price')</button>
                        </form>
                    </div>
                    <div class="bg-main-color rounded-3 py-4 px-3 mt-3">
                        <h3 class="fw-bold text-center">@lang('Rates')</h3>
                        @foreach ($comments as $comment)
                            <hr>
                            <div class="">
                                <h5 class="fw-bold m-0">{{ $comment->user->name }}</h5>
                                <p class="me-3">{{ $comment->comment }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if($hall->coordinates)
                    @php
                        $arr = explode(',', $hall->coordinates);
                    @endphp
                    @if(!empty($arr[0]) && !empty($arr[1]))
                        <div class="col-12 mt-5" id="map" style="height: 500px">
                        </div>
                        <!-- prettier-ignore -->
                        <script>(g => {
                                var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary",
                                    q = "__ib__", m = document, b = window;
                                b = b[c] || (b[c] = {});
                                var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams,
                                    u = () => h || (h = new Promise(async (f, n) => {
                                        await (a = m.createElement("script"));
                                        e.set("libraries", [...r] + "");
                                        for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                                        e.set("callback", c + ".maps." + q);
                                        a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                                        d[q] = f;
                                        a.onerror = () => h = n(Error(p + " could not load."));
                                        a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                                        m.head.append(a)
                                    }));
                                d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
                            })
                            ({key: "AIzaSyBIGmp8bK97RnjTIUdap3MytXuFh1T45KY", v: "weekly"});</script>
                    @endif
                @endif
            </div>
        </div>
        @if (count($hall->offers) > 0)
            <div class="bg-main-color py-4 my-2">
                <div class="container rounded bg-light p-4">
                    <h3 class="fw-bold text-center mb-4">@lang('Offers and services')</h3>
                    @foreach ($hall->offers as $offer)
                        <div class="p-3 border rounded-3 mb-4">
                            <p class="float-start">@lang('The offer is valid until') {{ $offer->date }}</p>
                            <p class="d-block mt-5 pt-2">{{ $offer->content() }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
        @endif
    </section>
    {{--@dd($hall->coordinates)--}}
    @if($hall->coordinates )
        @if(!empty($arr[0]) && !empty($arr[1]))

            {{--            <script type="text/javascript">--}}
            {{--                var myMap;--}}

            {{--                // Waiting for the API to load and DOM to be ready.--}}
            {{--                ymaps.ready(init);--}}

            {{--                function init() {--}}
            {{--                    /**--}}
            {{--                     * Creating an instance of the map and binding it to the container--}}
            {{--                     * with the specified ID ("map").--}}
            {{--                     */--}}
            {{--                    myMap = new ymaps.Map('map', {--}}
            {{--                        /**--}}
            {{--                         * When initializing the map, you must specify--}}
            {{--                         * its center and the zoom factor.--}}
            {{--                         */--}}
            {{--                        center: [{{!empty($arr[0]) ? $arr[0] : ''}}, {{!empty($arr[1]) ? $arr[1] : ''}}], // Moscow--}}
            {{--                        zoom: 10--}}
            {{--                    }, {--}}
            {{--                        searchControlProvider: 'yandex#search'--}}
            {{--                    });--}}

            {{--                }--}}

            {{--                // Add a layer to display the schematic map--}}
            {{--                map.addChild(new YMapDefaultSchemeLayer());--}}
            {{--            </script>--}}

            <script type="module">
                // Initialize and add the map
                let map;

                async function initMap() {
                    // The location of Uluru
                    const position = {
                        lat: {{!empty($arr[0]) ? $arr[0] : ''}},
                        lng: {{!empty($arr[1]) ? $arr[1] : ''}}
                    };
                    // Request needed libraries.
                    //@ts-ignore
                    const {
                        Map
                    } = await google.maps.importLibrary("maps");
                    const {
                        AdvancedMarkerElement
                    } = await google.maps.importLibrary("marker");

                    // The map, centered at Uluru
                    map = new Map(document.getElementById("map"), {
                        zoom: 17,
                        center: position,
                        mapId: "DEMO_MAP_ID",
                    });

                    // The marker, positioned at Uluru
                    const marker = new AdvancedMarkerElement({
                        map: map,
                        position: position,
                        title: "Uluru",
                    });
                }

                initMap();
            </script>

        @endif
    @endif
@endsection
