@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('medical', 'active')
@section('medical-open', 'menu-open')
@section('type-hospital', 'active')
@section('title')
    hospital
@endsection
@section('content_header_name')
    Danh sách loại cơ sở y tế
@endsection
@section('content_header_active')
    Danh sách loại cơ sở y tế
@endsection
@section('content')
    <div class="card-body">
        <table id="type-hospital" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Tên loại cơ sở</th>
                <th>Phân loại</th>
                <th>Hoạt động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($types as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    @if($item->type != 0)
                        <td>{{config('base.type_of_hospital')[$item->type]}}</td>
                    @else
                        <td></td>
                    @endif
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
            $('#type-hospital').DataTable({
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
