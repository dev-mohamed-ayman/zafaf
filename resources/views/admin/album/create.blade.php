@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">اضافة البوم</h3>
        </div>
        <form action="{{ route('admin.album.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="title" class="form-control" placeholder="العنوان">
                </div>
                <div class="form-group">
                    <label class="form-label">القاعه</label>
                    <select class="form-control" name="hall_id">
                        <option disabled selected>اختر قاعه</option>
                        @foreach(\App\Models\Hall::all() as $hall)
                            <option value="{{$hall->id}}">{{$hall->name_ar}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">الصورة</label>
                    <input type="file" accept="image/*" multiple name="images[]" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">المحتوي</label>
                    <textarea id="summernote" name="content"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>

@endsection
