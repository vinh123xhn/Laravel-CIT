@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('school', 'active')
@section('junior_high_school', 'active')
@section('school-open', 'menu-open')
@section('title')
    junior-high school
@endsection
@section('content_header_name')
    Danh sách trường thcs
@endsection
@section('content_header_active')
    Danh sách trường thcs
@endsection
@section('content')
    <div class="col-md-12">
        <a class="btn btn-primary float-right" href="{{route('admin.school.junior_high.form.get')}}">
            Tạo mới trường thcs
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
                <th>Tổng số lớp 6</th>
                <th>Tổng số lớp 7</th>
                <th>Tổng số lớp 8</th>
                <th>Tổng số lớp 9</th>
                <th>Tổng số học sinh</th>
                <th>Tổng số học sinh lớp 6</th>
                <th>Tổng số học sinh lớp 7</th>
                <th>Tổng số học sinh lớp 8</th>
                <th>Tổng số học sinh lớp 9</th>
                <th>Tổng số giáo viên, cán bộ, nhân viên</th>
                <th>Tổng số giáo viên</th>
                <th>Tổng số cán bộ quản lý</th>
                <th>Tổng số nhân viên</th>
                <th>Tổng số phòng học</th>
                <th>Tổng số phòng bộ môn</th>
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
                    <td>{{$item['junior_high']['total_of_class']}}</td>
                    <td>{{$item['junior_high']['total_of_6']}}</td>
                    <td>{{$item['junior_high']['total_of_7']}}</td>
                    <td>{{$item['junior_high']['total_of_8']}}</td>
                    <td>{{$item['junior_high']['total_of_9']}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$item['junior_high']['total_classroom']}}</td>
                    <td>{{$item['junior_high']['total_function_room']}}</td>
                    <td>{{$item['junior_high']['total_subject_room']}}</td>
                    <td>{{$item['junior_high']['total_device_full']}}</td>
                    <td>{{$item['junior_high']['total_device_not_full']}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.school.junior_high.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.school.junior_high.delete', $item->id)}}"><i class="fa fa-trash"></i></a>
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
