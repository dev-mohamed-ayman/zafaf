@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">تعديل المقال</h3>
        </div>
        <form action="{{ route('admin.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label">العنوان</label>
                    <input type="text" name="title" value="{{$blog->title}}" class="form-control" placeholder="العنوان">
                </div>
                <div class="form-group">
                    <label class="form-label">الصورة</label>
                    <input type="file" accept="image/*" name="image" class="form-control">
                    <img src="{{asset($blog->image)}}" width="80px">
                </div>
                <div class="form-group">
                    <label class="form-label">المحتوي</label>
                    <textarea id="summernote" name="content">{!! $blog->content !!}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
@endsection
