@extends('layout.master')
@section('medical', 'active')
@section('doctor', 'active')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('title')
    doctor
@endsection
@section('content_header_name')
    Danh sách nhân viên y tế
@endsection
@section('content_header_active')
    Danh sách nhân viên y tế
@endsection
@section('content')
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Nơi làm việc</th>
                <th>nghề nghiệp</th>
                <th>Ngày sinh</th>
                <th>Số điện thoại</th>
                <th>Đia chỉ</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($doctors as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->Hospital->name}}</td>
                    <td>{{config('base.type_of_doctor')[$item->type]}}</td>
                    <td>{{$item->birthday}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td></td>
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
            $("#example1").DataTable();
            $('#example2').DataTable({
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
