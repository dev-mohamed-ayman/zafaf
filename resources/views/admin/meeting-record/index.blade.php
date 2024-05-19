@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">سجلات الاجتماع</h3>
            <a href="{{ route('admin.meeting-record.create') }}" class="btn btn-primary float-right">اضافة
                سجل
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>المستخدم</th>
                        <th>القاعة</th>
                        <th>الوقت والتاريخ</th>
                        <th>Created at</th>
                        <th>Note</th>
                        <th>العمليات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($items as $item)
                        <tr>
                            <th>{{ $loop->index + 1 }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->hall->name_ar }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->note }}</td>
                            <td width="200">
                                <a href="{{ route('admin.meeting-record.edit', $item->id) }}" class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete{{ $item->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
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
                                    <form action="{{ route('admin.meeting-record.destroy', $item->id) }}" method="post">
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
@endsection
