@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">

@endsection
@section('school', 'active')
@section('nursery_school', 'active')
@section('school-open', 'menu-open')
@section('title')
    nursery school
@endsection
@section('content_header_name')
    Danh sách trường mầm non
@endsection
@section('content_header_active')
    Danh sách trường mầm non
@endsection
@section('content')
    <div class="col-md-12">
        <form method="get" action="{{route('admin.school.nursery.filter')}}">
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
        <a class="btn btn-primary float-right" href="{{route('admin.school.nursery.form.get')}}">
            Tạo mới trường mầm non
        </a>
        <a class="btn btn-primary float-right" href="{{route('admin.school.nursery.export-excel')}}" style="margin-right: 5px">
            Tải xuống Excel
        </a>
    </div>
    <div class="card-body" style="width: 100%; overflow: scroll">
        <table id="school" class="table table-bordered table-striped" style="width: 8000px">
            <thead>
            <tr>
                <th>Mã cơ sở</th>
                <th>Tên cơ sở</th>
                <th>Ảnh đại diện</th>
                <th>Quận/huyện</th>
                <th>Phường/xã</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Diện tích</th>
                <th>Website</th>
                <th>Ngày thành lập</th>
                <th>Tên hiệu trưởng</th>
                <th>Tổng số lớp nhóm trẻ</th>
                <th>Tổng số lớp nhóm 3-12 tháng</th>
                <th>Tổng số lớp nhóm 12-24 tháng</th>
                <th>Tổng số lớp nhóm 25-36 tháng</th>
                <th>Tổng số lớp nhóm ghép trẻ</th>
                <th>Tổng số lớp nhóm mẫu giáo</th>
                <th>Tổng số lớp nhóm 3-4 tuổi</th>
                <th>Tổng số lớp nhóm 4-5 tuổi</th>
                <th>Tổng số lớp nhóm 5-6 tuổi</th>
                <th>Tổng số lớp nhóm ghép mẫu giáo</th>
                <th>Tổng số học sinh nhà trẻ</th>
                <th>Tổng số học sinh 3-12 tháng</th>
                <th>Tổng số học sinh 13-24 tháng</th>
                <th>Tổng số học sinh 25-36 tháng</th>
                <th>Tổng số học sinh lớp ghép nhà trẻ</th>
                <th>Tổng số học sinh mẫu giáo</th>
                <th>Tổng số học sinh 3-4 tuổi</th>
                <th>Tổng số học sinh 4-5 tuổi</th>
                <th>Tổng số học sinh 5-6 tuổi</th>
                <th>Tổng số học sinh lớp ghép mẫu giáo</th>
                <th>Tổng số giáo viên, cán bộ, nhân viên</th>
                <th>Tổng số giáo viên nhà trẻ</th>
                <th>Tổng số giáo viên mẫu giáo</th>
                <th>Tổng số cán bộ quản lý</th>
                <th>Tổng số nhân viên</th>
                <th>Tổng số phòng học nhà trẻ</th>
                <th>Tổng số phòng học mẫu giáo</th>
                <th>Tổng số phòng học chức năng</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $item)
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
                    <td>{{$item['district']['name']}}</td>
                    <td>{{$item['commune']['name']}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->website}}</td>
                    <td>{{$item->acreage}}</td>
                    <td>{{$item->day_and_year}}</td>
                    <td>{{$item->name_of_principal}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_class']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_3_12']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_13_24']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_25_36']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_collect']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_class']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_3_4']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_4_5']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_5_6']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_collect']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_student']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_3_12_student']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_13_24_student']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_25_36_student']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_collect_student']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_student']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_3_4_student']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_4_5_student']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_5_6_student']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_collect_student']}}</td>
                    <td>{{$item["nursery"]['total_of_all_employees']}}</td>
                    <td>{{$item["nursery"]['total_of_manager']}}</td>
                    <td>{{$item["nursery"]['total_of_nursery_teacher']}}</td>
                    <td>{{$item["nursery"]['total_of_kindergarten_teacher']}}</td>
                    <td>{{$item["nursery"]['total_of_employees']}}</td>
                    <td>{{$item["nursery"]['total_classroom_nursery']}}</td>
                    <td>{{$item["nursery"]['total_classroom_kindergarten']}}</td>
                    <td>{{$item["nursery"]['total_function_room']}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.school.nursery.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.school.nursery.delete', $item->id)}}"><i class="fa fa-trash"></i></a>
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
            $('#school').DataTable();
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
