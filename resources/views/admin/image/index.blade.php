@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">الصور</h3>
            <button type="button" id="toast" class="btn btn-primary float-right" data-toggle="modal"
                    data-target="#create">اضافة
                صوره
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        @if(empty($album))
                            <th>الترتيب</th>
                        @endif
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <th>{{ $loop->index + 1 }}</th>
                            <td>
                                <img src="{{ asset($item->path) }}" alt="" width="100px">
                            </td>
                            @if(empty($album))
                                <td>{{ $item->order }}</td>
                            @endif
                            <td>
                                @if(empty($album))
                                    <button type="button" id="toast" class="btn btn-success" data-toggle="modal"
                                            data-target="#update{{ $item->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                @endif
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
                                    <form action="{{ route('image.update', $item->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="form-label">الترتيب</label>
                                                <input type="text" name="order" class=" form-control"
                                                       value="{{ $item->order }}" placeholder="الترتيب">
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
                                    <form action="{{ route('image.destroy', $item->id) }}" method="post">
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
                    <h4 class="modal-title">اضافة مدينة</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(empty($album))
                        <input type="hidden" name="hall_id" value="{{ !empty($hall_id) ? $hall_id : '' }}">
                    @else
                        <input type="hidden" name="album_id" value="{{ $album->id }}">
                    @endif
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="image" class="col-form-label">الصورة</label>
                            <input type="file" name="image" id="image" class="form-control" placeholder="الصورة">
                        </div>
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
