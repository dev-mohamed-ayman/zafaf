@extends('company.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>التحليل</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('company.analysis.details') }}" method="get">
                <div class="row">
                    <div class="col-md-8">
                        <label class=" form-label">القاعة</label>
                        <select id="hall" name="hall" class="form-control">
                            <option disabled selected>القاعة</option>
                            <option value="all">الكل</option>
                            @foreach ($halls as $hall)
                                <option value="{{ $hall->id }}">{{ $hall->name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 position-relative">
                        <button type="submit" class="btn btn-success w-100 position-absolute"
                                style="bottom:0;left:0">عرض
                        </button>
                    </div>
                </div>
            </form>
            <form action="{{ route('company.analysis.details') }}" class="mt-4" method="get">
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
            @if (!empty($hallDetails))
                <h2 class="mt-5 mb-3 text-center">التفاصيل</h2>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th class="w-25">عدد الزيارات</th>
                        <td class="w-75">{{ $hallDetails->sum('visits') }}</td>
                    </tr>
                    <tr>
                        <th class="w-25">عدد الطلبات</th>
                        @php
                            $total = 0;
                            foreach ($hallDetails as $item) {
                                $total = $total + count($item->orders);
                            }
                        @endphp
                        <td class="w-75">{{ $total }}</td>
                    </tr>
                    <tr>
                        <th class="w-25">عدد الانتقالات بين الصور</th>
                        <td class="w-75">{{ $hallDetails->sum('slide_images') }}</td>
                    </tr>
                    <tr>
                        <th class="w-25">عدد الضغطات علي الهاتف</th>
                        <td class="w-75">{{ $hallDetails->sum('show_phone') }}</td>
                    </tr>
                </table>
            @endif
        </div>
    </div>
@endsection
