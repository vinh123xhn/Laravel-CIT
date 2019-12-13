@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('school', 'active')
@section('cen_school', 'active')
@section('school-open', 'menu-open')
@section('title')
    cen school
@endsection
@section('content_header_name')
    Danh sách trung tâm giáo dục thường xuyên
@endsection
@section('content_header_active')
    Danh sách trung tâm giáo dục thường xuyên
@endsection
@section('content')
    <div class="col-md-12">
        <form method="get" action="{{route('admin.school.cec.filter')}}">
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
        <a class="btn btn-primary float-right" href="{{route('admin.school.cec.form.get')}}">
            Tạo mới trung tâm giáo dục thường xuyên
        </a>
        <a class="btn btn-primary float-right" href="{{route('admin.school.cec.export-excel')}}" style="margin-right: 5px">
            Tải xuống Excel
        </a>
    </div>
    <div class="card-body" style="width: 100%; overflow: scroll">
        <table id="school" class="table table-bordered table-striped" style="width: 7000px">
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
                <th>Tổng số lớp</th>
                <th>Tổng số lớp XMC</th>
                <th>Tổng số lớp GDTTSKBC</th>
                <th>Tổng số lớp 6</th>
                <th>Tổng số lớp 7</th>
                <th>Tổng số lớp 8</th>
                <th>Tổng số lớp 9</th>
                <th>Tổng số lớp 10</th>
                <th>Tổng số lớp 11</th>
                <th>Tổng số lớp 12</th>
                <th>Tổng số học sinh</th>
                <th>Tổng số học sinh XMC</th>
                <th>Tổng số học sinh GDTTSKBC</th>
                <th>Tổng số học sinh lớp 6</th>
                <th>Tổng số học sinh lớp 7</th>
                <th>Tổng số học sinh lớp 8</th>
                <th>Tổng số học sinh lớp 9</th>
                <th>Tổng số học sinh lớp 10</th>
                <th>Tổng số học sinh lớp 11</th>
                <th>Tổng số học sinh lớp 12</th>
                <th>Tổng số học sinh nghề 8</th>
                <th>Tổng số học sinh nghề 11</th>
                <th>Học viên CC tin học A,B,C</th>
                <th>Học viên CC N.Ngữ A,B,C</th>
                <th>Tổng số giáo viên, cán bộ, nhân viên</th>
                <th>Tổng số giáo viên</th>
                <th>Tổng số cán bộ quản lý</th>
                <th>Tổng số nhân viên</th>
                <th>Tổng số phòng học</th>
                <th>Tổng số phòng bộ môn</th>
                <th>Tổng số phòng chức năng</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($schools as $k => $item)
                <tr>
                    <td>{{$item->code}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        @if(!empty($item->avatar))
                            <a href="{{asset('storage/'.$item->avatar)}}">
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
                    <td>{{$item['cec']['total_of_grade_class']}}</td>
                    <td>{{$item['cec']['total_of_grade_xmc']}}</td>
                    <td>{{$item['cec']['total_of_grade_gdttskbc']}}</td>
                    <td>{{$item['cec']['total_of_grade_6']}}</td>
                    <td>{{$item['cec']['total_of_grade_7']}}</td>
                    <td>{{$item['cec']['total_of_grade_8']}}</td>
                    <td>{{$item['cec']['total_of_grade_9']}}</td>
                    <td>{{$item['cec']['total_of_grade_10']}}</td>
                    <td>{{$item['cec']['total_of_grade_11']}}</td>
                    <td>{{$item['cec']['total_of_grade_12']}}</td>
                    <td>{{$item['cec']['total_of_student']}}</td>
                    <td>{{$item['cec']['total_of_student_xmc']}}</td>
                    <td>{{$item['cec']['total_of_student_gdttskbc']}}</td>
                    <td>{{$item['cec']['total_of_student_6']}}</td>
                    <td>{{$item['cec']['total_of_student_7']}}</td>
                    <td>{{$item['cec']['total_of_student_8']}}</td>
                    <td>{{$item['cec']['total_of_student_9']}}</td>
                    <td>{{$item['cec']['total_of_student_10']}}</td>
                    <td>{{$item['cec']['total_of_student_11']}}</td>
                    <td>{{$item['cec']['total_of_student_12']}}</td>
                    <td>{{$item['cec']['total_of_student_work_8']}}</td>
                    <td>{{$item['cec']['total_of_student_work_11']}}</td>
                    <td>{{$item['cec']['total_of_student_it']}}</td>
                    <td>{{$item['cec']['total_of_student_international']}}</td>
                    <td>{{$item['cec']['total_of_all_employees']}}</td>
                    <td>{{$item['cec']['total_of_manager']}}</td>
                    <td>{{$item['cec']['total_of_teacher']}}</td>
                    <td>{{$item['cec']['total_of_employees']}}</td>
                    <td>{{$item['cec']['total_classroom']}}</td>
                    <td>{{$item['cec']['total_subject_room']}}</td>
                    <td>{{$item['cec']['total_function_room']}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.school.cec.form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                        <a href="{{route('admin.school.cec.delete', $item->id)}}"><i class="fa fa-trash"></i></a>
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
            $("#school").DataTable();
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
