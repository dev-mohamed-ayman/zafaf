@extends('frontend.layouts.master')
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
            margin-right: auto;
        }

        .map {
            position: relative;
            margin-top: 20px;
            height: 500px;
        }

        .map #mapImage {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 7;
            width: 100%;
            height: 100%;
        }

        .map #mapImageOverLay {
            position: absolute;
            content: '';
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, .6);
            z-index: 8;
        }

        .map .mapBtn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9;
            padding: 10px 80px;
            background-color: white;
            border: 1px solid #000;
            border-radius: 50px;
            transition: .4s;
        }

        .map .mapBtn:hover {
            background-color: var(--blue-color);
            border: none;
            color: white;
        }

        .map #map {
            position: absolute;
            inset: 0;
            z-index: 5;
            /*display: none;*/
        }
    </style>
    <div class="shadow py-3 bg-light" style="position: sticky; top: 0; z-index: 10;">
        <div class="container d-flex flex-column">
            <h3 class="fw-bold text-blue lg-m-0">{{ $hall->name() }}</h3>
            <div class="d-flex align-items-center gap-3">
                <span>
                    <i class="fa fa-star text-blue"></i>
                    <small
                            class="text-black-50">{{ \App\Models\Rate::query()->where('hall_id', $hall->id)->avg('rate')? \App\Models\Rate::query()->where('hall_id', $hall->id)->avg('rate'): '0' }}
                    </small>
                </span>
                <span>
                    التعليقات
                    <small class="text-black-50">({{ \App\Models\Rate::query()->where('hall_id', $hall->id)->count() }})
                    </small>
                </span>
                <span>
                    <i class="fa fa-location-pin text-blue"></i>
                    <small class="text-black-50">{{ $hall->city->title() }}</small>
                </span>
                <span class="d-flex align-items-center gap-1">
                    <i class="fa fa-phone text-blue"></i>
                    <small id="number" data-id="{{ $hall->id }}" class="d-block text-truncate text-black-50"
                           style="width: 60px;cursor: pointer; transition: .4s">
                        {{ $hall->phone }}
                    </small>
                </span>
                <a href="https://wa.me/{{ $hall->whatsapp }}"
                   class="text-decoration-none d-flex align-items-center gap-2">
                    <i class="fa-brands fa-whatsapp text-blue"></i>
                    <small class="text-black-50">@lang('Contact us')</small>
                </a>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 rounded-4 shadow p-0">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner rounded-5">
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
                                    <video src="{{ asset($image->path) }}" class="w-100 h-100 object-fit-contain "
                                           controls
                                           loop></video>
                                @else
                                    <img src="{{ asset($image->path) }}" class="d-block w-100 h-100 object-fit-contain">
                                @endif

                            </div>
                        @endforeach
                    </div>
                    @if (count($hall->images) > 1)
                        <button data-id="{{ $hall->id }}" class="slide-images carousel-control-prev" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" style="background-image: none" aria-hidden="true">
                                <i class="fa fa-chevron-left text-dark fw-bold fs-3 "></i>
                            </span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button data-id="{{ $hall->id }}" class="slide-images carousel-control-next" type="button"
                                data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" style="background-image: none" aria-hidden="true">
                                <i class="fa fa-chevron-right text-dark fw-bold fs-3    "></i>
                            </span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>
                <div class="mt-3 p-3">
                    <span class="text-black-50 d-flex align-items-center gap-2">
                        <i class="fa fa-users"></i>
                        @lang('Capacity per person') {{ $hall->size }}
                    </span>
                    <div class="pt-1 bg-secondary rounded-pill my-3 w-100"></div>
                    <span class="text-black-50 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-dollar-sign"></i>
                        @lang('Price per person') {{ $hall->price }} ريال
                    </span>
                    <div class="pt-1 bg-secondary rounded-pill my-3 w-100"></div>
                    <h3>@lang('More details')</h3>
                    <hr>
                    @if($hall->type == 'hotels')
                        @include('frontend.more-hotel-details')
                    @else
                        @include('frontend.more-hall-details')
                    @endif
                    <div class="pt-1 bg-secondary rounded-pill my-3 w-100"></div>
                    <span class="text-black-50">
                        {!! $hall->description() !!}
                    </span>
                </div>
                <hr>
                <div class="comments my-4">
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
                                @lang('Add')
                            </button>
                        </p>
                    </form>
                    @foreach ($comments as $comment)
                        <div class="row m-3 p-2 rounded shadow border">
                            <div class="col-2">
                                <img class="mx-auto" src="{{ asset('frontend/images/sara.png') }}" style="width: 80px"
                                     alt="">
                            </div>
                            <div class="col-10">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5 class="text-main">{{ $comment->user->name }}</h5>
                                    <small class="text-black-50 border shadow rounded py-2 px-3"> @lang('Rate')
                                        5</small>
                                </div>
                                <p class="text-black-50 mt-3">
                                    {{ $comment->comment }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <hr>

                @if(count($hall->teams) > 0)
                    <div class="mb-4">
                        <h3 class="fw-bold">تعرف على الفريق</h3>
                        @foreach($hall->teams as $team)
                            @if($loop->index > 0)
                                <hr>
                            @endif
                            <div class="px-3 d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="far fa-user fs-3 rounded-pill p-3 bg-secondary-subtle"></i>
                                    <div>
                                        <p class="m-0 fw-bold">{{$team->name}}</p>
                                        <small>{{$team->job}}</small>
                                    </div>
                                </div>
                                <a href="https://wa.me/{{$team->whatsapp}}" target="_blank"
                                   class="main-btn text-decoration-none px-4 py-2">ارسال رسالة</a>
                            </div>
                        @endforeach
                    </div>

                @endif
            </div>
            <div class="col-lg-4 order">
                <div class="border rounded-5 shadow py-4 px-3" style="position: sticky; top: 100px;">
                    <form action="{{ route('make-order.store') }}" method="post">
                        @csrf
                        <input type="text" name="name" placeholder="@lang('Name')">
                        <input type="email" name="email" placeholder="@lang('Email')">
                        <input type="tel" name="phone" placeholder="@lang('Phone')">
                        <input type="date" name="date" placeholder="@lang('Wedding date')">
                        <input type="number" name="count" placeholder="@lang('Budget')">
                        <input type="number" name="price" placeholder="@lang('Number of invitees')">
                        <textarea name="note" class="w-100 p-3 mb-3 fw-bold border rounded" rows="4"
                                  placeholder="الرسالة"></textarea>
                        <input type="hidden" name="hall_id" value="{{ $hall->id }}">
                        <div class="d-flex align-items-center gap-2">
                            <input type="checkbox" id="text" class="p-0" style="width: fit-content">
                            <label for="text">
                                <small>
                                    @lang('I have read the text of the user agreement.')
                                </small>
                            </label>
                        </div>
                        <button type="submit" class="w-100 main-btn">@lang('Request a price')</button>
                    </form>
                </div>
            </div>
            <div class="col-12">
                @if ($hall->coordinates)
                    @php
                        $arr = explode(',', $hall->coordinates);
                    @endphp
                    @if (!empty($arr[0]) && !empty($arr[1]))
                        <div class="map">
                            <div id="mapImageOverLay"></div>
                            <button class="mapBtn">خريطة</button>
                            <img
                                    src="https://static-maps.yandex.ru/1.x/?lang=tr_TR&l=map&ll=46.682354,24.698329&z=14&pt=46.682354,24.698329,pm2rdl"
                                    id="mapImage">
                            <div class="col-12" id="map" style="height: 500px">
                            </div>
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
                                d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) &&
                                    u().then(() => d[l](f, ...n))
                            })
                            ({key: "AIzaSyBIGmp8bK97RnjTIUdap3MytXuFh1T45KY", v: "weekly"});</script>
                    @endif
                @endif
            </div>
        </div>
    </div>



    @if ($hall->coordinates)
        @if (!empty($arr[0]) && !empty($arr[1]))
            <script type="module">
                // Initialize and add the map
                let map;

                async function initMap() {
                    // The location of Uluru
                    const position = {
                        lat: {{ !empty($arr[0]) ? $arr[0] : '' }},
                        lng: {{ !empty($arr[1]) ? $arr[1] : '' }}
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


                $(document).ready(function () {
                    $('.mapBtn').click(function () {
                        $('#mapImage').css('display', 'none');
                        $('#mapImageOverLay').css('display', 'none');
                        $('.mapBtn').css('display', 'none');
                    })
                })
            </script>
        @endif
    @endif
@endsection
