@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('title')
    district
@endsection
@section('content_header_name')
    Danh sách quận huyện
@endsection
@section('content_header_active')
    Danh sách quận huyện
@endsection
@section('redirect_to_list')
    <a href="{{route('admin.district.list')}}">
        Danh sách quận huyện
    </a>
@endsection
@section('district', 'active')
@section('content')
    <div class="col-md-12">
        <a class="btn btn-primary float-right" href="{{route('admin.district.form.get')}}">
            Tạo mới quận huyện
        </a>
    </div>
    <div class="card-body">
        <table id="district" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Tên quận huyện</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($districts as $item)
                @csrf
                <tr>
                    <td><a href="{{route('admin.commune.list', ['district_id' => $item->id])}}">{{$item->name}}</a></td>
                    <td width="10%" style="text-align: center">
                        <a href="{{route('admin.district.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.district.delete', $item->id)}}"><i class="fa fa-trash"></i></a>
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
            $('#district').DataTable({
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
