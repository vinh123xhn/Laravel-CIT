@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('school', 'active')
@section('primary_school', 'active')
@section('school-open', 'menu-open')
@section('title')
    primary school
@endsection
@section('content_header_name')
    Danh sách trường tiểu học
@endsection
@section('content_header_active')
    Danh sách trường tiểu học
@endsection
@section('content')
    <div class="col-md-12">
        <a class="btn btn-primary float-right" href="{{route('admin.school.primary.form.get')}}">
            Tạo mới trường tiểu học
        </a>
    </div>
    <div class="card-body" style="width: 100%; overflow: scroll">
        <table id="school" class="table table-bordered table-hover" style="width: 7000px">
            <thead>
            <tr>
                <th>Tên cơ sở</th>
                <th>Quận/huyện</th>
                <th>Phường/xã</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Diện tích</th>
                <th>Website</th>
                <th>Tên hiệu trưởng</th>
                <th>Tổng số lớp</th>
                <th>Tổng số lớp 1</th>
                <th>Tổng số lớp 2</th>
                <th>Tổng số lớp 3</th>
                <th>Tổng số lớp 4</th>
                <th>Tổng số lớp 5</th>
                <th>Tổng số học sinh</th>
                <th>Tổng số học sinh lớp 1</th>
                <th>Tổng số học sinh lớp 2</th>
                <th>Tổng số học sinh lớp 3</th>
                <th>Tổng số học sinh lớp 4</th>
                <th>Tổng số học sinh lớp 5</th>
                <th>Tổng số giáo viên, cán bộ, nhân viên</th>
                <th>Tổng số giáo viên</th>
                <th>Tổng số cán bộ quản lý</th>
                <th>Tổng số nhân viên</th>
                <th>Tổng số phòng học</th>
                <th>Tổng số phòng chức năng</th>
                <th>Tổng số thiết bị tối tiểu đầy đủ</th>
                <th>Tổng số thiết bị tối tiểu chưa đầy đủ</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->district->name}}</td>
                    <td>{{$item->commune->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->website}}</td>
                    <td>{{$item->acreage}}</td>
                    <td>{{$item->name_of_principal}}</td>
                    <td>{{$item["primary"]['total_of_class']}}</td>
                    <td>{{$item["primary"]['total_of_1']}}</td>
                    <td>{{$item["primary"]['total_of_2']}}</td>
                    <td>{{$item["primary"]['total_of_3']}}</td>
                    <td>{{$item["primary"]['total_of_4']}}</td>
                    <td>{{$item["primary"]['total_of_5']}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$item["primary"]['total_classroom']}}</td>
                    <td>{{$item["primary"]['total_function_room']}}</td>
                    <td>{{$item["primary"]['total_device_full']}}</td>
                    <td>{{$item["primary"]['total_device_not_full']}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.school.primary.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.school.primary.delete', $item->id)}}"><i class="fa fa-trash"></i></a>
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
