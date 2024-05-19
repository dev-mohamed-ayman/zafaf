@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">الاعدادات</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.setting.update', 1) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center">
                        <tr>
                            <th class="w-25">من نحن</th>
                            <td class="w-75">
                                <textarea name="about" id="summernote" class="form-control">{{ !empty($setting->about) ? $setting->about : '' }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">سياسة الخصوصية</th>
                            <td class="w-75">
                                <textarea name="term" id="summernote1" class="form-control">{{ !empty($setting->term) ? $setting->term : '' }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="w-25">الشعار</th>
                            <td class="w-75">
                                <input type="file" name="logo" class="form-control" accept="image/*">
                                @if(!empty($setting->logo))
                                    <img src="{{asset($setting->logo)}}" class="mt-2" style="width: 70px">
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <button type="submit" class="btn btn-success d-flex justify-content-end mt-3">حفظ</button>
            </form>
        </div>
    </div>
@endsection
