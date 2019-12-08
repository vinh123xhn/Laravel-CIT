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
                <li class="nav-item set-menu-width">
                    <a href="{{route('admin.dashboard')}}" class="nav-link @yield('chart')">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Biểu đồ
                        </p>
                    </a>
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
                    <li class="nav-item has-treeview @yield('school-open')">
                        <a href="#" class="nav-link @yield('school')">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Trường học
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right">7</span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview set-menu-width">
                            <li class="nav-item">
                                <a href="{{route('admin.school.nursery.list')}}" class="nav-link @yield('nursery_school')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mẫu giáo</p>
                                </a>
                            </li>
                            <li class="nav-item set-menu-width">
                                <a href="{{route('admin.school.primary.list')}}" class="nav-link @yield('primary_school')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tiểu học</p>
                                </a>
                            </li>
                            <li class="nav-item set-menu-width">
                                <a href="{{route('admin.school.junior_high.list')}}" class="nav-link @yield('junior_high_school')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Trường trung học cơ sở</p>
                                </a>
                            </li>
                            <li class="nav-item set-menu-width">
                                <a href="{{route('admin.school.high.list')}}" class="nav-link @yield('high_school')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Trường trung học phổ thông</p>
                                </a>
                            </li>
                            <li class="nav-item set-menu-width">
                                <a href="{{route('admin.school.primary_junior_high.list')}}" class="nav-link @yield('1_2_school')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Trường cấp 1 & 2</p>
                                </a>
                            </li>
                            <li class="nav-item set-menu-width">
                                <a href="{{route('admin.school.junior_and_high.list')}}" class="nav-link @yield('2_3_school')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Trường cấp 2 & 3</p>
                                </a>
                            </li>
                            <li class="nav-item set-menu-width">
                                <a href="{{route('admin.school.cec.list')}}" class="nav-link @yield('cen_school')">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Giáo dục thường xuyên</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item set-menu-width">
                        <a href="{{route('admin.teacher.list')}}" class="nav-link @yield('teacher')">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Nhân sự giáo dục
                            </p>
                        </a>
                    </li>
                    <li class="nav-item set-menu-width">
                        <a href="{{route('admin.student.list')}}" class="nav-link @yield('student')">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Học sinh
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
