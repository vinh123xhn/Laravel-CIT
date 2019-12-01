@extends('layout.master')
@section('title')
    cen school
@endsection
@section('content_header_name')
    Tạo mới trung tâm giáo dục thường xuyên
@endsection
@section('content_header_active')
    Tạo mới trung tâm giáo dục thường xuyên
@endsection
@section('school', 'active')
@section('cen_school', 'active')
@section('school-open', 'menu-open')
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới trung tâm giáo dục thường xuyên</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.school.cec.form.post')}}">
                @csrf
                <div class="card-body">
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên cơ sở</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên cơ sở giáo dục" value="{{old('name')}}">
                            @error('name')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quận/ huyện</label>
                            <select class="form-control select2" name="district_id" id="district" style="width: 100%;">
                                <option value="">Lựa chọn</option>
                                @foreach($districts as $k => $item)
                                    <option value="{{$k}}">{{$item}}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phường/ xã</label>
                            <select class="form-control select2" name="commune_id" id="commune" style="width: 100%;">
                                <option value="">Lựa chọn</option>
                            </select>
                            @error('commune_id')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{old('address')}}">
                            @error('address')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" placeholder="Nhập mã giới thiệu" value="{{old('phone')}}">
                            @error('phone')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email" value="{{old('email')}}">
                            @error('email')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Website</label>
                            <input type="text" class="form-control" name="website" placeholder="Nhập tên website" value="{{old('website')}}">
                            @error('website')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Diện tích (m2)</label>
                            <input type="text" class="form-control" name="acreage" placeholder="Nhập diện tích trường" value="{{old('acreage')}}">
                            @error('acreage')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên hiệu trưởng</label>
                            <input type="text" class="form-control" name="name_of_principal" placeholder="Nhập tên hiệu trưởng" value="{{old('name_of_principal')}}">
                            @error('name_of_principal')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp học</label>
                            <input type="number" class="form-control" name="total_of_class" placeholder="Nhập tổng số lớp" value="{{old('total_of_class') ? old('total_of_class') : 0}}">
                            @error('total_of_class')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp xóa mù chữ</label>
                            <input type="number" class="form-control" name="total_of_grade_class" placeholder="Nhập tổng số xóa mù chữ" value="{{old('total_of_grade_class') ? old('total_of_grade_class') : 0}}">
                            @error('total_of_grade_class')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp giáo dục tiếp tục sau khi biết chữ</label>
                            <input type="number" class="form-control" name="total_of_grade_gdttskbc" placeholder="Nhập tổng số lớp giáo dục tiếp tục sau khi biết chữ" value="{{old('total_of_grade_gdttskbc') ? old('total_of_grade_gdttskbc') : 0}}">
                            @error('total_of_grade_gdttskbc')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 6</label>
                            <input type="number" class="form-control" name="total_of_grade_6" placeholder="Nhập tổng số lớp 6" value="{{old('total_of_grade_6') ? old('total_of_grade_6') : 0}}">
                            @error('total_of_grade_6')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 7</label>
                            <input type="number" class="form-control" name="total_of_grade_7" placeholder="Nhập tổng số lớp 7" value="{{old('total_of_grade_7') ? old('total_of_grade_7') : 0}}">
                            @error('total_of_grade_7')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 8</label>
                            <input type="number" class="form-control" name="total_of_grade_8" placeholder="Nhập tổng số lớp 8" value="{{old('total_of_grade_8') ? old('total_of_grade_8') : 0}}">
                            @error('total_of_grade_8')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 9</label>
                            <input type="number" class="form-control" name="total_of_grade_9" placeholder="Nhập tổng số lớp 9" value="{{old('total_of_grade_9') ? old('total_of_grade_9') : 0}}">
                            @error('total_of_grade_9')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 10</label>
                            <input type="number" class="form-control" name="total_of_grade_10" placeholder="Nhập tổng số lớp 10" value="{{old('total_of_grade_10') ? old('total_of_grade_10') : 0}}">
                            @error('total_of_grade_10')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 11</label>
                            <input type="number" class="form-control" name="total_of_grade_11" placeholder="Nhập tổng số lớp 11" value="{{old('total_of_grade_11') ? old('total_of_grade_11') : 0}}">
                            @error('total_of_grade_11')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 12</label>
                            <input type="number" class="form-control" name="total_of_grade_12" placeholder="Nhập tổng số lớp 12" value="{{old('total_of_grade_12') ? old('total_of_grade_12') : 0}}">
                            @error('total_of_grade_12')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh</label>
                            <input type="number" class="form-control" name="total_of_student" placeholder="Nhập tổng số học sinh" value="{{old('total_of_student') ? old('total_of_student') : 0}}">
                            @error('total_of_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh XMC</label>
                            <input type="number" class="form-control" name="total_of_student_xmc" placeholder="Nhập tổng số học sinh XMC" value="{{old('total_of_student_xmc') ? old('total_of_student_xmc') : 0}}">
                            @error('total_of_student_xmc')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh GDTTSKBC</label>
                            <input type="number" class="form-control" name="total_of_student_gdttskbc" placeholder="Nhập tổng số học sinh GDTTSKBC" value="{{old('total_of_student_gdttskbc') ? old('total_of_student_gdttskbc') : 0}}">
                            @error('total_of_student_gdttskbc')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 6</label>
                            <input type="number" class="form-control" name="total_of_student_6" placeholder="Nhập tổng số học sinh lớp 6" value="{{old('total_of_student_6') ? old('total_of_student_6') : 0}}">
                            @error('total_of_student_6')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 7</label>
                            <input type="number" class="form-control" name="total_of_student_7" placeholder="Nhập tổng số học sinh lớp 7" value="{{old('total_of_student_7') ? old('total_of_student_7') : 0}}">
                            @error('total_of_student_7')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 8</label>
                            <input type="number" class="form-control" name="total_of_student_8" placeholder="Nhập tổng số học sinh lớp 8" value="{{old('total_of_student_8') ? old('total_of_student_8') : 0}}">
                            @error('total_of_student_8')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 9</label>
                            <input type="number" class="form-control" name="total_of_student_9" placeholder="Nhập tổng số học sinh lớp 9" value="{{old('total_of_student_9') ? old('total_of_student_9') : 0}}">
                            @error('total_of_student_9')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 10</label>
                            <input type="number" class="form-control" name="total_of_student_10" placeholder="Nhập tổng số học sinh lớp 10" value="{{old('total_of_student_10') ? old('total_of_student_10') : 0}}">
                            @error('total_of_student_10')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 11</label>
                            <input type="number" class="form-control" name="total_of_student_11" placeholder="Nhập tổng số học sinh lớp 11" value="{{old('total_of_student_11') ? old('total_of_student_11') : 0}}">
                            @error('total_of_student_11')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 12</label>
                            <input type="number" class="form-control" name="total_of_student_12" placeholder="Nhập tổng số học sinh lớp 12" value="{{old('total_of_student_12') ? old('total_of_student_12') : 0}}">
                            @error('total_of_student_12')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh nghề 8</label>
                            <input type="number" class="form-control" name="total_of_student_work_8" placeholder="Nhập tổng số học sinh nghề 8" value="{{old('total_of_student_work_8') ? old('total_of_student_work_8') : 0}}">
                            @error('total_of_student_work_8')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh nghề 11</label>
                            <input type="number" class="form-control" name="total_of_student_work_11" placeholder="Nhập tổng số học sinh nghề 11" value="{{old('total_of_student_work_11') ? old('total_of_student_work_11') : 0}}">
                            @error('total_of_student_work_11')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học viên cc tin học A,B,C</label>
                            <input type="number" class="form-control" name="total_of_student_it" placeholder="Nhập tổng số học viên cc tin học A,B,C" value="{{old('total_of_student_it') ? old('total_of_student_it') : 0}}">
                            @error('total_of_student_it')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học viên cc ngoại ngữ A,B,C</label>
                            <input type="number" class="form-control" name="total_of_student_international" placeholder="Nhập tổng số học viên cc ngoại ngữ A,B,C" value="{{old('total_of_student_international') ? old('total_of_student_international') : 0}}">
                            @error('total_of_student_international')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số cán bộ, giáo viên, nhân viên</label>
                            <input type="number" class="form-control" name="total_of_all_employees" placeholder="Nhập tổng số cán bộ, giáo viên, nhân viên" value="{{old('total_of_all_employees') ? old('total_of_all_employees') : 0}}">
                            @error('total_of_all_employees')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số cán bộ quản lý</label>
                            <input type="number" class="form-control" name="total_of_manager" placeholder="Nhập tổng số cán bộ quản lý" value="{{old('total_of_manager') ? old('total_of_manager') : 0}}">
                            @error('total_of_manager')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số giáo viên</label>
                            <input type="number" class="form-control" name="total_of_teacher" placeholder="Nhập tổng số giáo viên" value="{{old('total_of_teacher') ? old('total_of_teacher') : 0}}">
                            @error('total_of_teacher')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số nhân viên</label>
                            <input type="number" class="form-control" name="total_of_employees" placeholder="Nhập tổng số nhân viên" value="{{old('total_of_employees') ? old('total_of_employees') : 0}}">
                            @error('total_of_employees')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng học</label>
                            <input type="number" class="form-control" name="total_classroom" placeholder="Nhập tổng số phòng học" value="{{old('total_classroom') ? old('total_classroom') : 0}}">
                            @error('total_classroom')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng bộ môn</label>
                            <input type="number" class="form-control" name="total_subject_room" placeholder="Nhập tổng số phòng bộ môn" value="{{old('total_subject_room') ? old('total_subject_room') : 0}}">
                            @error('total_subject_room')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng chức năng</label>
                            <input type="number" class="form-control" name="total_function_room" placeholder="Nhập tổng số phòng chức năng" value="{{old('total_function_room') ? old('total_function_room') : 0}}">
                            @error('total_function_room')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('admin.school.cec.list')}}">quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('js')
<script>
    $('#district').on('change', function (e) {
        console.log(e);

        var cat_id = e.target.value;

        $.get('/ajax-get-commune?cat_id=' + cat_id, function (data) {
            $('#commune').empty();
            $.each(data, function (index, commune) {
                $('#commune').append('<option value="'+commune.id+'">'+commune.name+'</option>');
            })
        })
    });
</script>
@endsection
