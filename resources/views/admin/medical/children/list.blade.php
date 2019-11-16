@extends('layout.master')
@section('medical', 'active')
@section('children', 'active')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('title')
    children
@endsection
@section('content_header_name')
    Danh sách trẻ em suy dinh dưỡng
@endsection
@section('content_header_active')
    Danh sách trẻ em
@endsection
@section('content')
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Phân loại dinh dưỡng</th>
                <th>Nhận xét của bác sĩ</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($childrens as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->birthday}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{config('base.type_of_children')[$item->type]}}</td>
                    <td>{{$item->comment}}</td>
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
