<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('company.index') }}" class="nav-link {{ setSidebarActive(['company.index']) }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            لوحة التحكم
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.hall.index') }}"
                        class="nav-link {{ setSidebarActive(['company.hall.*']) }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            القاعات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.analysis.index') }}"
                        class="nav-link {{ setSidebarActive(['company.analysis.*']) }}">
                        <i class="nav-icon fa fa-chart-pie"></i>
                        <p>
                            التحليل
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.offer.index') }}"
                        class="nav-link {{ setSidebarActive(['company.offer.*']) }}">
                        <i class="nav-icon fas fa-gift"></i>
                        <p>
                            العروض والخدمات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.order.index') }}"
                        class="nav-link {{ setSidebarActive(['company.ordeer.*']) }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            الطلبات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('company.meeting-record.index') }}"
                       class="nav-link {{ setSidebarActive(['company.meeting-record.*']) }}">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            سجلات الاجتماع
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
