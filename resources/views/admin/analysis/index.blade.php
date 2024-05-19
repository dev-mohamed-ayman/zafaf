@extends('admin.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>التحليل</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.analysis.details') }}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <label class=" form-label">المستخدم</label>
                        <select id="user" name="user" class="form-control">
                            <option disabled selected>المستخدم</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class=" form-label">القاعة</label>
                        <select id="hall" name="hall" class="form-control">
                            <option disabled selected>القاعة</option>
                        </select>
                    </div>
                    <div class="col-md-4 position-relative">
                        <button type="submit" class="btn btn-success w-100 position-absolute"
                                style="bottom:0;left:0">عرض
                        </button>
                    </div>
                </div>
            </form>
            <form action="{{ route('admin.analysis.details') }}" class="mt-4" method="get">
                <div class="row">
                    <div class="col-md-8">
                        <input type="search" name="search" class="form-control" placeholder="انقر للبحث">
                    </div>
                    <div class="col-md-4 position-relative">
                        <button type="submit" class="btn btn-success w-100 position-absolute"
                                style="bottom:0;left:0">عرض
                        </button>
                    </div>
                </div>
            </form>
            <form action="{{ route('admin.analysis.details') }}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <label class=" form-label">من</label>
                        <input type="datetime-local" name="start_date" class="form-control" placeholder="من">
                    </div>
                    <div class="col-md-4">
                        <label class=" form-label">الي</label>
                        <input type="datetime-local" name="end_date" class="form-control" placeholder="الي">
                    </div>
                    <div class="col-md-4 position-relative">
                        <button type="submit" class="btn btn-success w-100 position-absolute"
                                style="bottom:0;left:0">عرض
                        </button>
                    </div>
                </div>
            </form>
            <h2 class="mt-5 mb-3 text-center">افضل 10 قاعات</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>القاعه</th>
                        <th>المستخدم</th>
                        <th>عدد الزيارات</th>
                        <th>عدد الطلبات</th>
                        <th>عدد الانتقالات بين الصور</th>
                        <th>عدد الضغطات علي الهاتف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($hallTopTen as $hallTop)
                        <tr>
                            <th>{{$loop->index + 1}}</th>
                            <td>{{$hallTop->name_ar}}</td>
                            <td>{{$hallTop->user->name}}</td>
                            <td>{{$hallTop->visits}}</td>
                            <td>{{count($hallTop->orders)}}</td>
                            <td>{{$hallTop->slide_images}}</td>
                            <td>{{$hallTop->show_phone}}</td>
                        </tr>
                    @empty
                        <td colspan="1000">لا يوجد قاعات</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
            @if (!empty($hall))
                <h2 class="mt-5 mb-3 text-center">التفاصيل</h2>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="w-25">عدد الزيارات</th>
                        <td class="w-75">{{ $hall->sum('visits') }}</td>
                    </tr>
                    <tr>
                        <th class="w-25">عدد الطلبات</th>
                        @php
                            $total = 0;
                            foreach ($hall as $item) {
                                $total = $total + count($item->orders);
                            }
                        @endphp
                        <td class="w-75">{{ $total }}</td>
                    </tr>
                    <tr>
                        <th class="w-25">عدد الانتقالات بين الصور</th>
                        <td class="w-75">{{ $hall->sum('slide_images') }}</td>
                    </tr>
                    <tr>
                        <th class="w-25">عدد الضغطات علي الهاتف</th>
                        <td class="w-75">{{ $hall->sum('show_phone') }}</td>
                    </tr>
                </table>
            @endif
        </div>
    </div>
    <script>
        $('document').ready(function () {
            $('#user').on('change', function () {
                let id = $(this).val();
                let url = "{{ url('dashboard/analysis/get-halls') }}" + '/' + id
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (data) {
                        $('#hall').html('')
                        $('#hall').append(`
                    <option disabled selected>القاعة</option>
                    `)
                        $('#hall').append(`
                    <option value="all">الكل</option>
                    `)
                        $.each(data, function (index, value) {
                            $('#hall').append(`

                        <option value="${value.id}">${value.name}</option>

                        `)
                        })
                    }
                })
            })
        })
    </script>
@endsection
