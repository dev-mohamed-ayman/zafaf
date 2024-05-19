@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">تعديل عرض</h3>
        </div>
        <form action="{{ route('admin.offer.update', $offer->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">تاريخ الانتهاء</label>
                    <input type="date" name="date" value="{{ $offer->date }}" class="form-control"
                        placeholder="تاريخ الانتهاء">
                </div>
                <div class="form-group">
                    <label class="form-label">الوصف بالعربي</label>
                    <textarea name="content_ar" class="form-control" placeholder="الوصف بالعربي">{{ $offer->content_ar }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">الوصف بالانجليزي</label>
                    <textarea name="content_en" class="form-control" placeholder="الوصف بالانجليزي">{{ $offer->content_en }}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">اختر قاعه</label>
                    <select name="hall_id" class="form-control">
                        <option disabled selected>اختر قاعه</option>
                        @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}" {{ $offer->hall_id == $hall->id ? 'selected' : '' }}>
                                {{ $hall->name_ar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">الصورة</label>
                    <input type="file" name="image" accept="image/*" class="form-control">
                    <img src="{{asset($offer->image)}}" width="120px" class="mt-3">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
@endsection
