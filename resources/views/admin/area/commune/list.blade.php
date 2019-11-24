@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('district', 'active')
@section('redirect_to_list')
    <a href="{{route('admin.commune.list', ['district_id' => $district_id])}}">
        Danh sách phường xã
    </a>
@endsection
@section('title')
    commune
@endsection
@section('content_header_name')
    Danh sách phường xã
@endsection
@section('content_header_active')
    Danh sách phường xã
@endsection
@section('content')
    <div class="col-md-12">
        <a class="btn btn-primary float-left" style="margin-left: 15px" href="{{route('admin.district.list')}}">
            Quận huyện
        </a>
        <a class="btn btn-primary float-right" href="{{route('admin.commune.form.get', ['district_id' => $district_id])}}">
            Tạo mới Phường xã
        </a>
    </div>
    <div class="card-body">
        <table id="commune" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Tên phường xã</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($communes as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td width="10%" style="text-align: center">
                        <a href="{{route('admin.commune.form.edit', ['id' => $item->id, 'district_id' => $district_id])}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.commune.delete', ['id' => $item->id, 'district_id' => $district_id])}}"><i class="fa fa-trash"></i></a>
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
            $('#commune').DataTable({
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
