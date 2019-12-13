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
        <form method="get" action="{{route('admin.student.filter')}}">
            <div class="col-md-2 float-left">
                <div class="form-group">
                    <select class="form-control select2" name="district_id" id="district" style="width: 100%;">
                        <option value="">Lựa chọn quận/ huyện</option>
                        @foreach($districts as $k => $item)
                            <option value="{{$k}}">{{$item}}</option>
                        @endforeach
                    </select>
                    @error('district_id')
                    <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-2 float-left">
                <div class="form-group">
                    <select class="form-control select2" name="commune_id" id="commune" style="width: 100%;">
                        <option value="">Lựa chọn phường/ xã</option>
                    </select>
                    @error('commune_id')
                    <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-2 float-left">
                <button type="submit" class="btn btn-primary">Bộ lọc</button>
            </div>
        </form>
        <a class="btn btn-primary float-right" href="{{route('admin.student.form.get')}}">
            Tạo mới học sinh
        </a>
        <a class="btn btn-primary float-right" href="{{route('admin.student.export-excel')}}" style="margin-right: 5px">
            Tải xuống Excel
        </a>
    </div>
    <div class="card-body" style="width: 100%; overflow: scroll">
        <table id="student" class="table table-bordered table-striped" style="margin-top: 0; width: 2000px">
            <thead>
            <tr>
                <th>Mã học sinh</th>
                <th>Họ và tên</th>
                <th>Ảnh đại diện</th>
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
                    <td>{{$item->code}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        @if(!empty($item->avatar))
                            <a href="{{asset('storage/'.$item->avatar)}}" class="fancybox" rel="group" >
                                <img id="avatar" style="max-width: 100px; height: 50px" src="{{asset('storage/'.$item->avatar)}}" alt="avatar"/>
                            </a>
                        @endif
                    </td>
                    <td>{{$item->birthday}}</td>
                    <td>{{config('base.gender')[$item->gender]}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->name_of_dad}}</td>
                    <td>{{$item->name_of_mom}}</td>
                    <td>{{$item['district']['name']}}</td>
                    <td>{{$item['commune']['name']}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item['school']['name']}}</td>
                    <td>{{config('base.type_of_student')[$item->type_of_student]}}</td>
                    <td>{{config('base.level_of_student')[$item->level]}}</td>
                    <td class="text-center">
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
            $('#student').DataTable();
        });

        $('#district').on('change', function (e) {
            console.log(e);

            var cat_id = e.target.value;

            $.get('/ajax-get-commune?cat_id=' + cat_id, function (data) {
                $('#commune').empty();
                $('#commune').append('<option value="">Lựa chọn quận huyện</option>');
                $.each(data, function (index, commune) {
                    $('#commune').append('<option value="'+commune.id+'">'+commune.name+'</option>');
                })
            })
        });
    </script>
@endsection
