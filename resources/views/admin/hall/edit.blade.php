@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">تعديل قاعة</h3>
        </div>
        <form action="{{ route('admin.hall.update', $hall->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">الاسم بالعربي</label>
                    <input type="text" name="name_ar" value="{{ $hall->name_ar }}" class="form-control"
                           placeholder="الاسم بالعربي">
                </div>
                <div class="form-group">
                    <label class="form-label">الاسم بالانجليزي</label>
                    <input type="text" name="name_en" value="{{ $hall->name_en }}" class="form-control"
                           placeholder="الاسم بالانجليزي">
                </div>
                <div class="form-group">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="address" value="{{ $hall->address }}" class="form-control"
                           placeholder="العنوان">
                </div>
                <div class="form-group">
                    <label class="form-label">احداثيات الموقع</label>
                    <input type="text" name="coordinates" value="{{ $hall->coordinates }}" class="form-control"
                           placeholder="احداثيات الموقع">
                </div>
                <div class="form-group">
                    <label class="form-label">الوصف بالعربي</label>
                    <textarea id="summernote" name="description_ar"
                              placeholder="الوصف بالعربي">{{ $hall->description_ar }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">الوصف بالانجليزي</label>
                    <textarea id="summernote1" name="description_en"
                              placeholder="الوصف بالانجليزي">{{ $hall->description_en }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">السعه</label>
                    <input type="text" name="size" value="{{ $hall->size }}" class="form-control"
                           placeholder="السعه">
                </div>
                <div class="form-group">
                    <label class="form-label">السعر</label>
                    <input type="text" name="price" value="{{ $hall->price }}" class="form-control"
                           placeholder="السعر">
                </div>
                <div class="form-group">
                    <label class="form-label">الهاتف</label>
                    <input type="text" name="phone" value="{{ $hall->phone }}" class="form-control"
                           placeholder="الهاتف">
                </div>
                <div class="form-group">
                    <label class="form-label">رقم الواتساب</label>
                    <input type="text" name="whatsapp" value="{{ $hall->whatsapp }}" class="form-control"
                           placeholder="رقم الواتساب">
                </div>
                <div class="form-group">
                    <label class="form-label">النوع</label>
                    <select name="type" class="form-control">
                        <option disabled selected>النوع</option>
                        <option value="hotels" {{ $hall->type == 'hotels' ? 'selected' : '' }}>فندق</option>
                        <option value="halls" {{ $hall->type == 'halls' ? 'selected' : '' }}>قاعة</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">هل يوجد عروض</label>
                    <select name="offer" class="form-control">
                        <option disabled selected>هل يوجد عروض</option>
                        <option value="1" {{ $hall->offer == '1' ? 'selected' : '' }}>نعم</option>
                        <option value="0" {{ $hall->offer == '0' ? 'selected' : '' }}>لا</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">الترتيب</label>
                    <select name="order" class="form-control">
                        <option disabled selected>الترتيب</option>
                        <option value="3" {{ $hall->order == '3' ? 'selected' : '' }}>vip</option>
                        <option value="2" {{ $hall->order == '2' ? 'selected' : '' }}>دايموند</option>
                        <option value="1" {{ $hall->order == '1' ? 'selected' : '' }}>جولد</option>
                        <option value="0" {{ $hall->order == '0' ? 'selected' : '' }}>مجاني</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">اختر مدينه</label>
                    <select name="city_id" class="form-control">
                        <option disabled selected>اختر مدينه</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ $hall->city_id == $city->id ? 'selected' : '' }}>
                                {{ $city->title_ar }} - {{ $city->title_en }} -
                                @if ($city->country == 'EG')
                                    (مصر)
                                @elseif($city->country == 'SA')
                                    (السعودية)
                                @elseif($city->country == 'AE')
                                    (الامارات)
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="details">
                    <hr>
                    <h3 class="text-center fw-bold">المزيد من التفاصيل</h3>
                    <hr>
                    <div id="hall" class="row">
                        @if(count($hallDetails) > 0)
                            @include('admin.hall.hall_details_edit')
                        @else
                            @include('admin.hall.hotel_details_edit')
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
@endsection
