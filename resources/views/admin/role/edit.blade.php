@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">تعديل صلاحية</h3>
        </div>
        <form action="{{ route('admin.role.update', $role->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="form-label">اسم الصلاحية</label>
                    <input type="text" name="name" value="{{$role->name}}" id="name" class="form-control" placeholder="اسم الصلاحية">
                </div>
                <div class="form-group">
                    <label for="permission" class="form-label">الأذونات</label>
                    <div class="d-flex align-items-center">
                        @foreach($permissions as $permission)
                            @if($loop->index != '0')
                                <span>|</span>
                            @endif
                            <div class="mx-3">
                                <input type="checkbox" {{in_array( strval($permission->id), $rolePermissions) ? 'checked' : ''}} name="permissions[]" value="{{$permission->name}}"
                                       id="permission{{$permission->id}}" class=""
                                       placeholder="الأذونات">
                                <label for="permission{{$permission->id}}" class="m-0">{{$permission->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
@endsection
