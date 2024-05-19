@extends('company.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">اضافة عرض</h3>
        </div>
        <form action="{{ route('company.offer.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">تاريخ الانتهاء</label>
                    <input type="date" name="date" class="form-control" placeholder="تاريخ الانتهاء">
                </div>
                <div class="form-group">
                    <label class="form-label">الوصف بالعربي</label>
                    <textarea name="content_ar" class="form-control" placeholder="الوصف بالعربي"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">الوصف بالانجليزي</label>
                    <textarea name="content_en" class="form-control" placeholder="الوصف بالانجليزي"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">اختر قاعه</label>
                    <select name="hall_id" class="form-control">
                        <option disabled selected>اختر قاعه</option>
                        @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}">{{ $hall->name_ar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">الصورة</label>
                    <input type="file" name="image" accept="image/*" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
@endsection
