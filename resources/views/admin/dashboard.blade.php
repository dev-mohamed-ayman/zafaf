@extends('admin.layouts.master')
@section('title', 'لوحه التحكم')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ App\Models\Hall::count() }}</h3>

                    <p>القاعات</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ App\Models\Hall::sum('visits') }}</h3>

                    <p>الزيارات</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ App\Models\Offer::count() }}</h3>

                    <p>العروض</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ App\Models\Order::count() }}</h3>

                    <p>الطلبات</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-3">افضل 10 قاعات من حيث :</h4>
            <form action="{{ route('admin.top.ten') }}" method="get">
                <select name="val" class="form-control">
                    <option disabled selected>افضل 10 قاعات من حيث</option>
                    <option value="visits">عدد الزيارات</option>
                    <option value="slide_images">مرات التنقل بين الصور</option>
                    <option value="show_phone">مرات عرض رقم الهاتف</option>
                </select>
                <button type="submit" class="btn btn-success w-100 mt-3">عرض</button>
            </form>
        </div>
        <div class="card-body">
            @if (!empty($items))
                <div class="table table-responsive">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم القاعه</th>
                                    <th>اسم المستخدم</th>
                                    <th>المدينه</th>
                                    <th>السعه</th>
                                    <th>السعر</th>
                                    <th>الوصف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $item)
                                    <tr>
                                        <th>{{ $loop->index + 1 }}</th>
                                        <td><a href="{{ route('hall.details', $item->id) }}">{{ $item->name_ar }}</a></td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->city->title_ar }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->description_ar }}</td>
                                    @empty
                                    <tr>
                                        <td colspan="1000">لا يوجد بيانات</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @else
            @endif

        </div>
    </div>
    </div>
@endsection
