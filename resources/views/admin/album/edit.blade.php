@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">تعديل الالبوم</h3>
        </div>
        <form action="{{ route('admin.album.update', $album->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="title" value="{{$album->title}}" class="form-control"
                           placeholder="العنوان">
                </div>
                <div class="form-group">
                    <label class="form-label">القاعه</label>
                    <select class="form-control" name="hall_id">
                        <option disabled selected>اختر قاعه</option>
                        @foreach(\App\Models\Hall::all() as $hall)
                            <option
                                value="{{$hall->id}}" {{$hall->id == $album->hall_id ? 'selected' : ''}}>{{$hall->name_ar}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">الصورة</label>
                    <input type="file" accept="image/*" name="image" class="form-control">
                    <img src="{{asset($album->image)}}" width="80px">
                </div>
                <div class="form-group">
                    <label class="form-label">المحتوي</label>
                    <textarea id="summernote" name="content">{!! $album->content !!}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
@endsection
