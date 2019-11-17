@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('medical', 'active')
@section('hospital', 'active')
@section('medical-open', 'menu-open')
@section('title')
    hospital
@endsection
@section('content_header_name')
    Danh sách trung tâm y tế
@endsection
@section('content_header_active')
    Danh sách trung tâm y tế
@endsection
@section('content')
    <div class="card-body">
        <table id="hospital" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Tên cơ sở</th>
                <th>Loại cơ sở</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Website</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($hospitals as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->Type->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->website}}</td>
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
            $('#hospital').DataTable({
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
