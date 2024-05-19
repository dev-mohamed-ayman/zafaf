<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">لوحة تحكم زفاف</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link {{ setSidebarActive(['admin.index']) }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            لوحة التحكم
                        </p>
                    </a>
                </li>
                @can('city')
                    <li class="nav-item">
                        <a href="{{ route('admin.city.index') }}"
                           class="nav-link {{ setSidebarActive(['admin.city.*']) }}">
                            <i class="nav-icon fas fa-city"></i>
                            <p>
                                المدن
                            </p>
                        </a>
                    </li>
                @endcan
                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{ route('admin.user.index') }}" class="nav-link {{ setSidebarActive(['admin.user.*']) }}">--}}
                {{--                        <i class="nav-icon fas fa-users"></i>--}}
                {{--                        <p>--}}
                {{--                            المستخدمين--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                @can('users and roles')
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ setSidebarActive(['admin.user.*', 'admin.role.*']) }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                المستخدمين
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('users list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.user.index') }}"
                                       class="nav-link {{ setSidebarActive(['admin.user.*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>قائمة المستخدمين</p>
                                    </a>
                                </li>
                            @endcan
                            @can('roles')
                                <li class="nav-item">
                                    <a href="{{ route('admin.role.index') }}"
                                       class="nav-link {{ setSidebarActive(['admin.role.*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الصلاحيات</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('analysis')
                    <li class="nav-item">
                        <a href="{{ route('admin.analysis.index') }}"
                           class="nav-link {{ setSidebarActive(['admin.analysis.*']) }}">
                            <i class="nav-icon fa fa-chart-pie"></i>
                            <p>
                                التحليل
                            </p>
                        </a>
                    </li>
                @endcan
                @can('halls')
                    <li class="nav-item">
                        <a href="#" class="nav-link {{ setSidebarActive(['admin.hall.*', 'admin.hall-edit.*']) }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                القاعات
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('halls list')
                                <li class="nav-item">
                                    <a href="{{ route('admin.hall.index') }}"
                                       class="nav-link {{ setSidebarActive(['admin.hall.*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>قائمة القاعات</p>
                                    </a>
                                </li>
                            @endcan
                            @can('halls updates')
                                <li class="nav-item">
                                    <a href="{{ route('admin.hall-edit.index') }}"
                                       class="nav-link {{ setSidebarActive(['admin.hall-edit.*']) }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>قائمة التعديلات</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                {{--                <li class="nav-item">--}}
                {{--                    <a href="{{ route('admin.hall.index') }}"--}}
                {{--                        class="nav-link {{ setSidebarActive(['admin.hall.*']) }}">--}}
                {{--                        <i class="nav-icon fas fa-building"></i>--}}
                {{--                        <p>--}}
                {{--                            القاعات--}}
                {{--                        </p>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                @can('offers')
                    <li class="nav-item">
                        <a href="{{ route('admin.offer.index') }}"
                           class="nav-link {{ setSidebarActive(['admin.offer.*']) }}">
                            <i class="nav-icon fas fa-gift"></i>
                            <p>
                                العروض والخدمات
                            </p>
                        </a>
                    </li>
                @endcan
                @can('orders')
                    <li class="nav-item">
                        <a href="{{ route('admin.order.index') }}"
                           class="nav-link {{ setSidebarActive(['admin.ordeer.*']) }}">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                الطلبات
                            </p>
                        </a>
                    </li>
                @endcan
                @can('company orders')
                    <li class="nav-item">
                        <a href="{{ route('admin.company.index') }}"
                           class="nav-link {{ setSidebarActive(['admin.company.*']) }}">
                            <i class="nav-icon fas fa-check"></i>
                            <p>
                                طلبات الشركات
                            </p>
                        </a>
                    </li>
                @endcan
                @can('rate orders')
                    <li class="nav-item">
                        <a href="{{ route('admin.rate.index') }}"
                           class="nav-link {{ setSidebarActive(['admin.rate.*']) }}">
                            <i class="nav-icon fas fa-check"></i>
                            <p>
                                طلبات التقييمات
                            </p>
                        </a>
                    </li>
                @endcan
                @can('blog')
                    <li class="nav-item">
                        <a href="{{ route('admin.blog.index') }}"
                           class="nav-link {{ setSidebarActive(['admin.blog.*']) }}">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                المقالات
                            </p>
                        </a>
                    </li>
                @endcan
                @can('meeting record')
                    <li class="nav-item">
                        <a href="{{ route('admin.meeting-record.index') }}"
                           class="nav-link {{ setSidebarActive(['admin.meeting-record.*']) }}">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                سجلات الاجتماع
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('admin.album.index') }}"
                       class="nav-link {{ setSidebarActive(['admin.album.*']) }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            الالبومات
                        </p>
                    </a>
                </li>
                @can('settings')
                    <li class="nav-item">
                        <a href="{{ route('admin.setting.index') }}"
                           class="nav-link {{ setSidebarActive(['admin.setting.*']) }}">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                الاعدادات
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
