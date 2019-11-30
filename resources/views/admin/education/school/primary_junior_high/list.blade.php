@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('school', 'active')
@section('1_2_school', 'active')
@section('school-open', 'menu-open')
@section('title')
    1_2 school
@endsection
@section('content_header_name')
    Danh sách trường cấp 1 và 2
@endsection
@section('content_header_active')
    Danh sách trường cấp 1 và 2
@endsection
@section('content')
    <div class="col-md-12">
        <form method="get" action="{{route('admin.school.primary_junior_high.filter')}}">
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
        <a class="btn btn-primary float-right" href="{{route('admin.school.primary_junior_high.form.get')}}">
            Tạo mới trường cấp 1 và 2
        </a>
        <a class="btn btn-primary float-right" href="{{route('admin.school.primary_junior_high.export-excel')}}" style="margin-right: 5px">
            Tải xuống Excel
        </a>
    </div>
    <div class="card-body" style="width: 100%; overflow: scroll">
        <table id="school" class="table table-bordered table-hover" style="width: 7000px">
            <thead>
            <tr>
                <th>Tên cơ sở</th>
                <th>Quận/huyện</th>
                <th>Phường/xã</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Diện tích</th>
                <th>Website</th>
                <th>Tên hiệu trưởng</th>
                <th>Tổng số lớp</th>
                <th>Tổng số lớp 1</th>
                <th>Tổng số lớp 2</th>
                <th>Tổng số lớp 3</th>
                <th>Tổng số lớp 4</th>
                <th>Tổng số lớp 5</th>
                <th>Tổng số lớp 6</th>
                <th>Tổng số lớp 7</th>
                <th>Tổng số lớp 8</th>
                <th>Tổng số lớp 9</th>
                <th>Tổng số học sinh</th>
                <th>Tổng số học sinh lớp 1</th>
                <th>Tổng số học sinh lớp 2</th>
                <th>Tổng số học sinh lớp 3</th>
                <th>Tổng số học sinh lớp 4</th>
                <th>Tổng số học sinh lớp 5</th>
                <th>Tổng số học sinh lớp 6</th>
                <th>Tổng số học sinh lớp 7</th>
                <th>Tổng số học sinh lớp 8</th>
                <th>Tổng số học sinh lớp 9</th>
                <th>Tổng số giáo viên, cán bộ, nhân viên</th>
                <th>Tổng số giáo viên tiểu học</th>
                <th>Tổng số giáo viên thcs</th>
                <th>Tổng số cán bộ quản lý</th>
                <th>Tổng số nhân viên</th>
                <th>Tổng số phòng học</th>
                <th>Tổng số phòng bộ môn</th>
                <th>Tổng số phòng chức năng</th>
                <th>Tổng số thiết bị tối tiểu đầy đủ</th>
                <th>Tổng số thiết bị tối tiểu chưa đầy đủ</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->district->name}}</td>
                    <td>{{$item->commune->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->website}}</td>
                    <td>{{$item->acreage}}</td>
                    <td>{{$item->name_of_principal}}</td>
                    <td>{{$item['primary_junior']['total_of_class']}}</td>
                    <td>{{$item['primary_junior']['total_of_grade_1']}}</td>
                    <td>{{$item['primary_junior']['total_of_grade_2']}}</td>
                    <td>{{$item['primary_junior']['total_of_grade_3']}}</td>
                    <td>{{$item['primary_junior']['total_of_grade_4']}}</td>
                    <td>{{$item['primary_junior']['total_of_grade_5']}}</td>
                    <td>{{$item['primary_junior']['total_of_grade_6']}}</td>
                    <td>{{$item['primary_junior']['total_of_grade_7']}}</td>
                    <td>{{$item['primary_junior']['total_of_grade_8']}}</td>
                    <td>{{$item['primary_junior']['total_of_grade_9']}}</td>
                    <td>{{$item['primary_junior']['total_of_student']}}</td>
                    <td>{{$item['primary_junior']['total_of_student_1']}}</td>
                    <td>{{$item['primary_junior']['total_of_student_2']}}</td>
                    <td>{{$item['primary_junior']['total_of_student_3']}}</td>
                    <td>{{$item['primary_junior']['total_of_student_4']}}</td>
                    <td>{{$item['primary_junior']['total_of_student_5']}}</td>
                    <td>{{$item['primary_junior']['total_of_student_6']}}</td>
                    <td>{{$item['primary_junior']['total_of_student_7']}}</td>
                    <td>{{$item['primary_junior']['total_of_student_8']}}</td>
                    <td>{{$item['primary_junior']['total_of_student_9']}}</td>
                    <td>{{$item['primary_junior']['total_of_all_employees']}}</td>
                    <td>{{$item['primary_junior']['total_of_manager']}}</td>
                    <td>{{$item['primary_junior']['total_of_primary_teacher']}}</td>
                    <td>{{$item['primary_junior']['total_of_junior_high_teacher']}}</td>
                    <td>{{$item['primary_junior']['total_of_employees']}}</td>
                    <td>{{$item['primary_junior']['total_classroom']}}</td>
                    <td>{{$item['primary_junior']['total_function_room']}}</td>
                    <td>{{$item['primary_junior']['total_subject_room']}}</td>
                    <td>{{$item['primary_junior']['total_device_full']}}</td>
                    <td>{{$item['primary_junior']['total_device_not_full']}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.school.primary_junior_high.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.school.primary_junior_high.delete', $item->id)}}"><i class="fa fa-trash"></i></a>
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
            $('#school').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
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
