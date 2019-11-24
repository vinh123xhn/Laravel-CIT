<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('img/nguyenthienduc-giainhat-a.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 16px">Hệ thống thông tin Huế</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(Session::get('user')['avatar'] ? asset('storage/'.Session::get('user')['avatar']) : '#')}}" style="width: 60px; height: 60px" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.user.detail', Session::get('user')['id'])}}" class="d-block">{{Session::get('user')['name']}}</a>
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
                            Biểu đồ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Giáo dục</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(Session::get('user')['group'] == 1)
                <li class="nav-item">
                    <a href="{{route('admin.user.list')}}" class="nav-link @yield('user')">
                        <i class="nav-icon far fa-bookmark"></i>
                        <p>
                            Người dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.district.list')}}" class="nav-link @yield('district')">
                        <i class="nav-icon far fa-bookmark"></i>
                        <p>
                            Quận/huyện
                        </p>
                    </a>
                </li>
                @endif
                @if(Session::get('user')['group'] == 1 || Session::get('user')['group'] == 2)
                <li class="nav-item has-treeview @yield('education-open')">
                    <a href="#" class="nav-link @yield('education')">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Giáo dục
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">4</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.school.list')}}" class="nav-link @yield('school')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cơ sở giáo dục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.teacher.list')}}" class="nav-link @yield('teacher')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhân sự giáo dục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.student.list')}}" class="nav-link @yield('student')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Học sinh</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
