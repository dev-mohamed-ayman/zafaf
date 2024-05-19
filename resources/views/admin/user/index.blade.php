@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">المستخدمين</h3>

            @can('users create')
                <a href="{{route('admin.user.create')}}" class="float-right btn btn-primary">اضافة مستخدم</a>

            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد</th>
                        <th>الهاتف</th>
                        <th>الصلاحية</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <th>{{$loop->index + 1}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{ count($item->roles) > 0 ? $item->roles[0]->name : 'مستخدم'}}</td>
                            <td>
            @can('users update')
                                <button type="button" id="toast" class="btn btn-success" data-toggle="modal"
                                        data-target="#update{{$item->id}}">
                                    <i class="fa fa-edit"></i>
                                </button>
            @endcan

            @can('users delete')
                                <button type="button" id="toast" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete{{$item->id}}">
                                    <i class="fa fa-trash"></i>
                                </button>

            @endcan
                            </td>
                        </tr>
                        {{--Modal Update--}}
                        <div class="modal fade" id="update{{$item->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">تعديل</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.user.update', $item->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name" class="col-form-label">اسم المستخدم</label>
                                                <input type="text" name="name" id="name"
                                                       value="{{old('name', $item->name)}}" class="form-control"
                                                       placeholder="اسم المستخدم">
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-form-label">البريد الالكتروني</label>
                                                <input type="email" name="email" id="email"
                                                       value="{{old('email', $item->email)}}" class="form-control"
                                                       placeholder="البريد الالكتروني">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="col-form-label">الهاتف</label>
                                                <input type="number" name="phone" id="phone"
                                                       value="{{old('phone', $item->phone)}}" class="form-control"
                                                       placeholder="الهاتف">
                                            </div>
                                            <div class="form-group">
                                                <label for="role" class="form-label">الصلاحية</label>
                                                <select class="form-control" id="role" name="role">
                                                    <option selected disabled>اختر صلاحية</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->name}}" @if(count($item->roles) > 0)
                                                            {{$item->roles[0]->name == $role->name ? 'selected' : ''}}
                                                                @endif>{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-form-label">كلمة المرور</label>
                                                <input type="password" name="password" id="password"
                                                       class="form-control"
                                                       placeholder="كلمة المرور">
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation" class="col-form-label">تاكيد كلمة
                                                    المرور</label>
                                                <input type="password" name="password_confirmation"
                                                       id="password_confirmation"
                                                       class="form-control"
                                                       placeholder="تاكيد كلمة المرور">
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        {{--Modal Delete--}}
                        <div class="modal fade" id="delete{{$item->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">حذف</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.user.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-body">
                                            <div class="bg-danger p-3 text-center">
                                                هل ان متاكد من الحذف
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-primary">نعم</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    @empty
                        <tr>
                            <td colspan="1000">لا يوجد بيانات</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div>
                    {{$items->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
