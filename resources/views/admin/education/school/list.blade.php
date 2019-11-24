@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('education', 'active')
@section('school', 'active')
@section('education', 'menu-open')
@section('title')
    school
@endsection
@section('content_header_name')
    Danh sách cơ sở giáo dục
@endsection
@section('content_header_active')
    Danh sách cơ sở giáo dục
@endsection
@section('content')
    <div class="col-md-12">
        <a class="btn btn-primary float-right" href="{{route('admin.school.form.get')}}">
            Tạo mới cơ sở giáo dục
        </a>
    </div>
    <div class="card-body">
        <table id="hospital" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Tên cơ sở</th>
                <th>Loại cơ sở</th>
                <th>Quận/huyện</th>
                <th>Phường/xã</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Diện tích</th>
                <th>Website</th>
                <th>Tên hiệu trưởng</th>
                <th>Tổng số học sinh</th>
                <th>Tổng số giáo viên</th>
                <th>Tổng số cán bộ quản lý</th>
                <th>Tổng số nhân viên</th>
                <th>Tổng số phòng học</th>
                <th>Tổng số nhân viên</th>
                <th>Tổng số nhân viên</th>
                <th>Tổng số nhân viên</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{config('base.type_of_school')[$item->type_of_school]}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->website}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.school.detail', $item->id)}}"><i class="fa fa-eye"></i></a>
                        <a href="{{route('admin.school.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.school.delete', $item->id)}}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

    <script>
        $(function () {
            $('#school').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
