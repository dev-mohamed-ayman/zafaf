@extends('frontend.layouts.master')
@section('content')
    <style>
        .card {
            cursor: pointer;
        }

        #step2,
        #step3,
        #step4 {
            display: none;
        }

        textarea {
            outline: none;
        }
    </style>
    <div class="container py-5">
        <div id="step1">
            <h2 class="text-center fw-bold mb-5">@lang('What do you need for your wedding?')</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <img src="{{asset('frontend/images/hall.jpeg')}}" alt="">
                        <div class="card-body">
                            <h3 class="my-4 text-blue text-center">@lang('Hotels')</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <img src="{{asset('frontend/images/hall.jpeg')}}" alt="">
                        <div class="card-body">
                            <h3 class="my-4 text-blue text-center">@lang('Halls')</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('make-order.store') }}" method="post">
            @csrf
            <div id="step2">
                <h5 class="fw-bold mb-5">@lang('What person did you allocate for the wedding?')</h5>
                <div class="border p-3 rounded d-flex align-items-center gap-3 mb-3">
                    <input type="radio" name="price" value="100-50" id="price1" style="width: 23px; height: 23px;">
                    <label for="price1">100-50 @lang('Rial')</label>
                </div>
                <div class="border p-3 rounded d-flex align-items-center gap-3 mb-3">
                    <input type="radio" name="price" value="100-200" id="price2" style="width: 23px; height: 23px;">
                    <label for="price2">100-200 @lang('Rial')</label>
                </div>
                <div class="border p-3 rounded d-flex align-items-center gap-3 mb-3">
                    <input type="radio" name="price" value="200-250" id="price3" style="width: 23px; height: 23px;">
                    <label for="price3">200-250 @lang('Rial')</label>
                </div>
                <div class="border p-3 rounded d-flex align-items-center gap-3 mb-3">
                    <input type="radio" name="price" value="250-300" id="price4" style="width: 23px; height: 23px;">
                    <label for="price4">250-300 @lang('Rial')</label>
                </div>
                <div class="border p-3 rounded d-flex align-items-center gap-3 mb-3">
                    <input type="radio" name="price" value="300-350" id="price5" style="width: 23px; height: 23px;">
                    <label for="price5">300-350 @lang('Rial')</label>
                </div>
                <div class="border p-3 rounded d-flex align-items-center gap-3 mb-3">
                    <input type="radio" name="price" value="500-1000" id="price6" style="width: 23px; height: 23px;">
                    <label for="price6">500-1000 @lang('Rial')</label>
                </div>
                <div class="border p-3 rounded d-flex align-items-center gap-3 mb-3">
                    <input type="radio" name="price" value="1000-2000" id="price7" style="width: 23px; height: 23px;">
                    <label for="price7">1000-2000 @lang('Rial')</label>
                </div>
                <button type="button" id="nextStep3" class="main-btn d-block mx-auto px-4">@lang('Next')</button>
            </div>
            <div id="step3">
                <h5 class="fw-bold mb-5">@lang('Are there any other details you would like to mention?')</h5>
                <textarea name="note" id="note" class="border w-100 rounded border-danger p-4" rows="10"></textarea>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <button type="button" id="backStep2" class="main-btn d-block mx-auto px-4">@lang('Back')</button>
                    <button type="button" id="nextStep4" class="main-btn d-block mx-auto px-4">@lang('Next')</button>
                </div>
            </div>
            <div id="step4">
                <h5 class="fw-bold mb-5">@lang('Finally, how can companies contact you?')</h5>
                <input type="text" name="name" placeholder="@lang('Name')"
                       class="w-100 p-3 mb-3 fw-bold border rounded-pill" style="outline: none">
                <input type="email" name="email" placeholder="@lang('Email')"
                       class="w-100 p-3 mb-3 fw-bold border rounded-pill" style="outline: none">
                <input type="nubmer" name="phone" placeholder="@lang('Phone')"
                       class="w-100 p-3 mb-3 fw-bold border rounded-pill" style="outline: none">
                <input type="date" name="date" placeholder="@lang('Wedding date')"
                       class="w-100 p-3 mb-3 fw-bold border rounded-pill" style="outline: none">
                <input type="nubmer" name="count" placeholder="@lang('Number of invitees')"
                       class="w-100 p-3 mb-3 fw-bold border rounded-pill" style="outline: none">
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <button type="button" id="backStep3" class="main-btn d-block mx-auto px-4">@lang('Back')</button>
                    <button type="submit" id="lastStep" class="main-btn d-block mx-auto px-4">@lang('Send')</button>
                </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.card').click(function () {
                $('#step1').css('display', 'none')
                $('#step2').css('display', 'block')
            });
            $('#nextStep3').click(function () {
                $('#step1').css('display', 'none')
                $('#step2').css('display', 'none')
                $('#step3').css('display', 'block')
            });
            $('#nextStep4').click(function () {
                $('#step1').css('display', 'none')
                $('#step2').css('display', 'none')
                $('#step3').css('display', 'none')
                $('#step4').css('display', 'block')
            });
            $('#backStep2').click(function () {
                $('#step1').css('display', 'none')
                $('#step2').css('display', 'block')
                $('#step3').css('display', 'none')
                $('#step4').css('display', 'none')
            });
            $('#backStep2').click(function () {
                $('#step1').css('display', 'none')
                $('#step2').css('display', 'none')
                $('#step3').css('display', 'block')
                $('#step4').css('display', 'none')
            });
        });
    </script>
@endsection
