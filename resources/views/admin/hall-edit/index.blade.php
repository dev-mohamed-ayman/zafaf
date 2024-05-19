@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">التعديلات</h3>
            <div class="float-right w-75 row">
                <form id="hallForm" action="{{route('admin.hall-edit.create')}}" method="get" class="col-md-6">
                    <select id="hall" class="form-control" name="hall">
                        <option>اختر قاعة</option>
                        <option value="all">الكل</option>
                        @foreach(\App\Models\Hall::all() as $hall)
                            <option value="{{$hall->id}}">{{$hall->name_ar. ' - ' . $hall->name_en}}</option>
                        @endforeach
                    </select>
                </form>
                <form id="userForm" action="{{route('admin.hall-edit.show', '1')}}" method="get" class="col-md-6">
                    <select id="user" class="form-control" name="user">
                        <option>اختر مستخدم</option>
                        <option value="all">الكل</option>
                        @foreach(\App\Models\User::all() as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </form>
                <form id="hallForm" action="{{route('admin.hall-edit.store')}}" method="post" class="col-md-12 mt-2 d-flex align-items-center">
                    @csrf
                    <div class="w-75 d-flex align-items-center">
                        <div class="form-group w-50 ml-2">
                            <label class="form-label">من</label>
                            <input type="datetime-local" name="start_date" class="form-control">
                        </div>
                        <div class="form-group w-50">
                            <label class="form-label">الي</label>
                            <input type="datetime-local" name="end_date" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3 w-25 ml-2">تنفيذ</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($items as $item)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="m-0">القاعه :&nbsp;</h4>
                                    <p class="m-0">{{$item->hall->name_ar}} - {{$item->hall->name_en}}</p>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="m-0">المستخدم :&nbsp;</h4>
                                    <p class="m-0">{{$item->user->name}}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <h4 class="m-0">تاريخ التعديل :&nbsp;</h4>
                                    <p class="m-0">{{$item->created_at}}</p>
                                </div>
                                <div class="mt-3">
                                    <h4 class="m-0"> تم تعديل :&nbsp;</h4>
                                    @if(is_array($item->actions))
                                        <div class="mr-3">
                                            @foreach($item->actions as $key => $action)
                                                <p class="m-0">{{$action}}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                {{ $items->links() }}
            </div>
        </div>
    </div>
    <script>
        var hall = document.getElementById('hall');
        var hallForm = document.getElementById('hallForm');
        var user = document.getElementById('user');
        var userForm = document.getElementById('userForm');

        hall.addEventListener('change', function () {
            hallForm.submit();
        })

        user.addEventListener('change', function () {
            userForm.submit();
        })
    </script>
@endsection
