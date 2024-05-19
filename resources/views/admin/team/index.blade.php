@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">الفريق</h3>
            <button type="button" id="toast" class="btn btn-primary float-right" data-toggle="modal"
                    data-target="#create">اضافة

            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>المسمي الوظيفي</th>
                        <th>رقم الواتساب</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <th>{{ $loop->index + 1 }}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->job}}</td>
                            <td>{{$item->whatsapp}}</td>
                            <td>
                                <button type="button" id="toast" class="btn btn-success" data-toggle="modal"
                                        data-target="#update{{ $item->id }}">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" id="toast" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete{{ $item->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        {{-- Modal Update --}}
                        <div class="modal fade" id="update{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">تعديل</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.team.update', $item->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name" class="col-form-label">الاسم</label>
                                                <input type="text" name="name" value="{{$item->name}}" id="name"
                                                       class="form-control" placeholder="الاسم">
                                            </div>
                                            <div class="form-group">
                                                <label for="job" class="col-form-label">المسمي الوظيفي</label>
                                                <input type="text" name="job" value="{{$item->job}}" id="job"
                                                       class="form-control" placeholder="المسمي الوظيفي">
                                            </div>
                                            <div class="form-group">
                                                <label for="whatsapp" class="col-form-label">رقم الواتساب</label>
                                                <input type="text" name="whatsapp" value="{{$item->whatsapp}}"
                                                       id="whatsapp" class="form-control" placeholder="رقم الواتساب">
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">اغلاق
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        {{-- Modal Delete --}}
                        <div class="modal fade" id="delete{{ $item->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">حذف</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.team.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-body">
                                            <div class="bg-danger p-3 text-center">
                                                هل ان متاكد من الحذف
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="submit" class="btn btn-primary">نعم</button>
                                            <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">اغلاق
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
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Create --}}
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">اضافة</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.team.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">الاسم</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="الاسم">
                        </div>
                        <div class="form-group">
                            <label for="job" class="col-form-label">المسمي الوظيفي</label>
                            <input type="text" name="job" id="job" class="form-control" placeholder="المسمي الوظيفي">
                        </div>
                        <div class="form-group">
                            <label for="whatsapp" class="col-form-label">رقم الواتساب</label>
                            <input type="text" name="whatsapp" id="whatsapp" class="form-control"
                                   placeholder="رقم الواتساب">
                        </div>
                        <input type="hidden" name="hall_id" value="{{$id}}">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
