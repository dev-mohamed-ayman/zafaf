@extends('company.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">سجلات الاجتماع</h3>
            <a href="{{ route('company.meeting-record.create') }}" class="btn btn-primary float-right">اضافة
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
                        </tr>
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
