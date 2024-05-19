@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">اضافة مستخدم</h3>
        </div>
        <form action="{{route('admin.user.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="name" class="form-label">الاسم</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="الاسم">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="phone" class="form-label">الهاتف</label>
                        <input type="number" id="phone" name="phone" class="form-control" placeholder="الهاتف">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email" class="form-label">البريد الالكتروني</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="البريد الالكتروني">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="city_id" class="form-label">المدينة</label>
                        <select class="form-control" id="city_id" name="city_id">
                            <option selected disabled>اختر مدينة</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->title_ar}} - {{$city->title_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="role" class="form-label">الصلاحية</label>
                        <select class="form-control" id="role" name="role">
                            <option selected disabled>اختر صلاحية</option>
                            @foreach($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="كلمة المرور">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="password_confirmation" class="form-label">تاكيد كلمة المرور</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="كلمة المرور">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">اضافة</button>
            </div>
        </form>
    </div>
@endsection
