@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class=" d-flex align-items-center justify-content-between">
                <h3 class="">القاعات</h3>
                <form action="{{ route('admin.hall.search') }}" method="post" class="d-flex align-items-center">
                    @csrf
                    <input type="search" name="res" class="form-control" placeholder="بحث">
                    <select class="form-control mx-2" name="type">
                        <option selected disabled>الصنف</option>
                        <option value="hotels">فندق</option>
                        <option value="halls">قاعة</option>
                    </select>
                    <select class="form-control mx-2" name="city_id">
                        <option selected disabled>المدينة</option>
                        @foreach (\App\Models\City::all() as $city)
                            <option value="{{ $city->id }}">{{ $city->title_ar }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">بحث</button>
                </form>
                @can('halls create')
                    <a href="{{ route('admin.hall.create') }}" class="btn btn-primary">اضافة
                        قاعة
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم القاعه بالعربي</th>
                            <th>اسم القاعه بالانجليزي</th>
                            <th>المدينه</th>
                            <th>السعه</th>
                            <th>السعر</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <th>{{ $loop->index + 1 }}</th>
                                <td>{{ $item->name_ar }}</td>
                                <td>{{ $item->name_en }}</td>
                                <td>{{ $item->city->title_ar }}</td>
                                <td>{{ $item->size }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @can('halls update')
                                        <a href="{{ route('admin.hall.edit', $item->id) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan
                                    <a href="{{ route('image.show', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-images"></i>
                                    </a>
                                    <a href="{{ route('admin.hall.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a href="{{ route('admin.meeting-record.show', $item->id) }}"
                                        class="btn btn-sm btn-secondary">
                                        <i class="fa fa-book"></i>
                                    </a>
                                    <a href="{{ route('admin.hall-edit.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fa fa-user-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.team.show', $item->id) }}"
                                        class="btn btn-sm btn-info mt-1">
                                        <i class="fa fa-users"></i>
                                    </a>
                                    @can('halls delete')
                                        <button type="button" class="btn btn-sm btn-danger mt-1" data-toggle="modal"
                                            data-target="#delete{{ $item->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    @endcan
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
                                        <form action="{{ route('admin.hall.destroy', $item->id) }}" method="post">
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
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
