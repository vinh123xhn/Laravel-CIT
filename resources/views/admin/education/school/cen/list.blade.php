@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('school', 'active')
@section('cen_school', 'active')
@section('school-open', 'menu-open')
@section('title')
    cen school
@endsection
@section('content_header_name')
    Danh sách trung tâm giáo dục thường xuyên
@endsection
@section('content_header_active')
    Danh sách trung tâm giáo dục thường xuyên
@endsection
@section('content')
    <div class="col-md-12">
        <a class="btn btn-primary float-right" href="{{route('admin.school.cen.form.get')}}">
            Tạo mới trung tâm giáo dục thường xuyên
        </a>
    </div>
    <div class="card-body" style="width: 100%; overflow: scroll">
        <table id="school" class="table table-bordered table-hover" style="width: 2500px">
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
                <th>Tổng số lớp XMC</th>
                <th>Tổng số lớp GDTTSKBC</th>
                <th>Tổng số lớp 6</th>
                <th>Tổng số lớp 7</th>
                <th>Tổng số lớp 8</th>
                <th>Tổng số lớp 9</th>
                <th>Tổng số lớp 10</th>
                <th>Tổng số lớp 11</th>
                <th>Tổng số lớp 12</th>
                <th>Tổng số học sinh</th>
                <th>Tổng số học sinh XMC</th>
                <th>Tổng số học sinh GDTTSKBC</th>
                <th>Tổng số học sinh lớp 6</th>
                <th>Tổng số học sinh lớp 7</th>
                <th>Tổng số học sinh lớp 8</th>
                <th>Tổng số học sinh lớp 9</th>
                <th>Tổng số học sinh lớp 10</th>
                <th>Tổng số học sinh lớp 11</th>
                <th>Tổng số học sinh lớp 12</th>
                <th>Tổng số học sinh nghề 8</th>
                <th>Tổng số học sinh nghề 11</th>
                <th>Học viên CC tin học A,B,C</th>
                <th>Học viên CC N.Ngữ A,B,C</th>
                <th>Tổng số giáo viên, cán bộ, nhân viên</th>
                <th>Tổng số giáo viên</th>
                <th>Tổng số cán bộ quản lý</th>
                <th>Tổng số nhân viên</th>
                <th>Tổng số phòng học</th>
                <th>Tổng số phòng bộ môn</th>
                <th>Tổng số phòng chức năng</th>
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
