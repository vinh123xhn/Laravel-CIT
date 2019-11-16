<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('img/nguyenthienduc-giainhat-a.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 16px">Hệ thống thông tin Huế</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Session::get('user')['name'] or 'Customer'}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Trang chủ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trang chủ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link @yield('medical')">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Y tế
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">4</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.hospital.list')}}" class="nav-link @yield('hospital')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cơ sở y tế</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.hospital.list')}}" class="nav-link @yield('medical')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại bệnh viện</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.hospital.list')}}" class="nav-link @yield('doctor')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhân sự y tế</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.hospital.list')}}" class="nav-link @yield('children')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Trẻ em suy dinh dưỡng</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
