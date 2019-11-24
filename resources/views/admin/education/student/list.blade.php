@extends('layout.master')
@section('education', 'active')
@section('student', 'active')
@section('education', 'menu-open')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('title')
    student
@endsection
@section('content_header_name')
    Danh sách học sinh
@endsection
@section('content_header_active')
    Danh sách học sinh
@endsection
@section('content')
    <div class="col-md-12">
        <a class="btn btn-primary float-right" href="{{route('admin.student.form.get')}}">
            Tạo mới học sinh
        </a>
    </div>
    <div class="card-body">
        <table id="children" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Số điện thoại</th>
                <th>Họ tên cha</th>
                <th>Họ tên mẹ</th>
                <th>Quận/huyện</th>
                <th>Phường/xã</th>
                <th>Địa chỉ</th>
                <th>Trường</th>
                <th>Phân loại học lực</th>
                <th>Lớp</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->birthday}}</td>
                    <td>{{config('base.gender')[$item->gender]}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->name_of_dad}}</td>
                    <td>{{$item->name_of_mom}}</td>
                    <td>{{$item->district->name}}</td>
                    <td>{{$item->commune->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->school->name}}</td>
                    <td>{{config('base.type_of_student')[$item->type_of_student]}}</td>
                    <td>{{config('base.level_of_student')[$item->level]}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.student.detail', $item->id)}}"><i class="fa fa-eye"></i></a>
                        <a href="{{route('admin.student.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.student.delete', $item->id)}}"><i class="fa fa-trash"></i></a>
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
            $('#cstudent).DataTable({
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
