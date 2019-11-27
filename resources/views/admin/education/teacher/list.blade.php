@extends('layout.master')
@section('education', 'active')
@section('teacher', 'active')
@section('education', 'menu-open')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('title')
    teacher
@endsection
@section('content_header_name')
    Danh sách nhân sự giáo dục
@endsection
@section('content_header_active')
    Danh sách nhân sự giáo dục
@endsection
@section('content')
    <div class="col-md-12">
        <a class="btn btn-primary float-right" href="{{route('admin.teacher.form.get')}}">
            Tạo mới nhân sự giáo dục
        </a>
    </div>
    <div class="card-body" style="width: 100%; overflow: scroll">
        <table id="doctor" class="table table-bordered table-hover " style="width: 1300px">
            <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Thư điện tử</th>
                <th>Quận/huyện</th>
                <th>Phường/xã</th>
                <th>Địa chỉ</th>
                <th>Trường</th>
                <th>Phân loại giáo viên</th>
                <th>Trình độ học vấn</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teachers as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->birthday}}</td>
                    <td>{{config('base.gender')[$item->gender]}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item['district']['name']}}</td>
                    <td>{{$item['commune']['name']}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item['school']['name']}}</td>
                    <td>{{config('base.type_of_teacher')[$item->type_teacher]}}</td>
                    <td>{{config('base.level_of_teacher')[$item->level]}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.teacher.detail', $item->id)}}"><i class="fa fa-eye"></i></a>
                        <a href="{{route('admin.teacher.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.teacher.delete', $item->id)}}"><i class="fa fa-trash"></i></a>
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
            $('#doctor').DataTable({
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
