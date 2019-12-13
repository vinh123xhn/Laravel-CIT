@extends('layout.master')
@section('title')
    2_3 school
@endsection
@section('school', 'active')
@section('2_3_school', 'active')
@section('school-open', 'menu-open')
@section('content_header_name')
    Tạo mới trường cấp 2 và 3
@endsection
@section('content_header_active')
    Tạo mới trường cấp 2 và 3
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới trường cấp 2 và 3</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.school.junior_and_high.form.update', $school->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã cơ sở</label>
                            <input type="text" name="code" class="form-control" placeholder="Nhập mã cơ sở giáo dục" value="{{old('code') ? old('code') : $school->code}}">
                            @error('code')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên cơ sở</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên cơ sở y tế" value="{{old('name') ? old('name') : $school->name}}">
                            @error('name')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ảnh đại diện</label>
                        <input type='file' onchange="readURL(this);" name="avatar"/>
                        <br>
                        @if(isset($school->avatar))
                            <img id="avatar" style="width: 100px; height: 200px" src="{{asset('storage/'.$school->avatar)}}" alt="avatar"/>
                        @else
                            <img id="avatar" style="width: 100px; height: 200px" src="#" alt="avatar"/>
                        @endif
                        @error('avatar')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Quận/ huyện</label>
                            <select class="form-control select2" name="district_id" id="district" style="width: 100%;">
                                @foreach($districts as $k => $item)
                                    <option
                                        @if($school->district_id == $k)
                                        {{"selected"}}
                                        @endif
                                        value="{{$k}}">{{$item}}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phường/ xã</label>
                            <select class="form-control select2" name="commune_id" id="commune" style="width: 100%;">
                                @foreach($communes as $k => $item)
                                    <option
                                        @if($school->commune_id == $k)
                                        {{"selected"}}
                                        @endif
                                        value="{{$k}}">{{$item}}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{old('address') ? old('address') : $school->address}}">
                            @error('address')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" placeholder="Nhập mã giới thiệu" value="{{old('phone') ? old('phone') : $school->phone}}">
                            @error('phone')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email" value="{{old('email') ? old('email') : $school->email}}">
                            @error('email')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Website</label>
                            <input type="text" class="form-control" name="website" placeholder="Nhập tên website" value="{{old('website') ? old('website') : $school->website}}">
                            @error('website')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Diện tích (m2)</label>
                            <input type="text" class="form-control" name="acreage" placeholder="Nhập diện tích trường" value="{{old('acreage') ? old('acreage') : $school->acreage}}">
                            @error('acreage')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày thành lập</label>
                            <input type="text" class="form-control" name="day_and_year" placeholder="Nhập ngày thành lập" value="{{old('day_and_year') ? old('day_and_year') : $school->day_and_year}}">
                            @error('day_and_year')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên hiệu trưởng</label>
                            <input type="text" class="form-control" name="name_of_principal" placeholder="Nhập tên hiệu trưởng" value="{{old('name_of_principal') ? old('name_of_principal') : $school->name_of_principal}}">
                            @error('name_of_principal')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp học</label>
                            <input type="number" class="form-control" name="total_of_class" placeholder="Nhập tổng số lớp" value="{{old('total_of_class') ? old('total_of_class') : $data->total_of_class}}">
                            @error('total_of_class')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 6</label>
                            <input type="number" class="form-control" name="total_of_grade_6" placeholder="Nhập tổng số lớp 6" value="{{old('total_of_grade_6') ? old('total_of_grade_6') : $data->total_of_grade_6}}">
                            @error('total_of_grade_6')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 7</label>
                            <input type="number" class="form-control" name="total_of_grade_7" placeholder="Nhập tổng số lớp 7" value="{{old('total_of_grade_7') ? old('total_of_grade_7') : $data->total_of_grade_7}}">
                            @error('total_of_grade_7')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 8</label>
                            <input type="number" class="form-control" name="total_of_grade_8" placeholder="Nhập tổng số lớp 8" value="{{old('total_of_grade_8') ? old('total_of_grade_8') : $data->total_of_grade_8}}">
                            @error('total_of_grade_8')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 9</label>
                            <input type="number" class="form-control" name="total_of_grade_9" placeholder="Nhập tổng số lớp 9" value="{{old('total_of_grade_9') ? old('total_of_grade_9') : $data->total_of_grade_9}}">
                            @error('total_of_grade_9')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 10</label>
                            <input type="number" class="form-control" name="total_of_grade_10" placeholder="Nhập tổng số lớp 10" value="{{old('total_of_grade_10') ? old('total_of_grade_10') : $data->total_of_grade_10}}">
                            @error('total_of_grade_10')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 11</label>
                            <input type="number" class="form-control" name="total_of_grade_11" placeholder="Nhập tổng số lớp 11" value="{{old('total_of_grade_11') ? old('total_of_grade_11') : $data->total_of_grade_11}}">
                            @error('total_of_grade_11')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 12</label>
                            <input type="number" class="form-control" name="total_of_grade_12" placeholder="Nhập tổng số lớp 12" value="{{old('total_of_grade_12') ? old('total_of_grade_12') : $data->total_of_grade_12}}">
                            @error('total_of_grade_12')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh</label>
                            <input type="number" class="form-control" name="total_of_student" placeholder="Nhập tổng số học sinh" value="{{old('total_of_student') ? old('total_of_student') : $data->total_of_student}}">
                            @error('total_of_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 6</label>
                            <input type="number" class="form-control" name="total_of_student_6" placeholder="Nhập tổng số học sinh lớp 6" value="{{old('total_of_student_6') ? old('total_of_student_6') : $data->total_of_student_6}}">
                            @error('total_of_student_6')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 7</label>
                            <input type="number" class="form-control" name="total_of_student_7" placeholder="Nhập tổng số học sinh lớp 7" value="{{old('total_of_student_7') ? old('total_of_student_7') : $data->total_of_student_7}}">
                            @error('total_of_student_7')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 8</label>
                            <input type="number" class="form-control" name="total_of_student_8" placeholder="Nhập tổng số học sinh lớp 8" value="{{old('total_of_student_8') ? old('total_of_student_8') : $data->total_of_student_8}}">
                            @error('total_of_student_8')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 9</label>
                            <input type="number" class="form-control" name="total_of_student_9" placeholder="Nhập tổng số học sinh lớp 9" value="{{old('total_of_student_9') ? old('total_of_student_9') : $data->total_of_student_9}}">
                            @error('total_of_student_9')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 10</label>
                            <input type="number" class="form-control" name="total_of_student_10" placeholder="Nhập tổng số học sinh lớp 10" value="{{old('total_of_student_10') ? old('total_of_student_10') : $data->total_of_student_10}}">
                            @error('total_of_student_10')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 11</label>
                            <input type="number" class="form-control" name="total_of_student_11" placeholder="Nhập tổng số học sinh lớp 11" value="{{old('total_of_student_11') ? old('total_of_student_11') : $data->total_of_student_11}}">
                            @error('total_of_student_11')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp 12</label>
                            <input type="number" class="form-control" name="total_of_student_12" placeholder="Nhập tổng số học sinh lớp 12" value="{{old('total_of_student_12') ? old('total_of_student_12') : $data->total_of_student_12}}">
                            @error('total_of_student_12')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số cán bộ, giáo viên, nhân viên</label>
                            <input type="number" class="form-control" name="total_of_all_employees" placeholder="Nhập tổng số cán bộ, giáo viên, nhân viên" value="{{old('total_of_all_employees') ? old('total_of_all_employees') : $data->total_of_all_employees}}">
                            @error('total_of_all_employees')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số cán bộ quản lý</label>
                            <input type="number" class="form-control" name="total_of_manager" placeholder="Nhập tổng số cán bộ quản lý" value="{{old('total_of_manager') ? old('total_of_manager') : $data->total_of_manager}}">
                            @error('total_of_manager')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số giáo viên</label>
                            <input type="number" class="form-control" name="total_of_teacher" placeholder="Nhập tổng số giáo viên" value="{{old('total_of_teacher') ? old('total_of_teacher') : $data->total_of_teacher}}">
                            @error('total_of_teacher')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số nhân viên</label>
                            <input type="number" class="form-control" name="total_of_employees" placeholder="Nhập tổng số nhân viên" value="{{old('total_of_employees') ? old('total_of_employees') : $data->total_of_employees}}">
                            @error('total_of_employees')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng học</label>
                            <input type="number" class="form-control" name="total_classroom" placeholder="Nhập tổng số phòng học" value="{{old('total_classroom') ? old('total_classroom') : $data->total_classroom}}">
                            @error('total_classroom')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng chức năng</label>
                            <input type="number" class="form-control" name="total_function_room" placeholder="Nhập tổng số phòng chức năng" value="{{old('total_function_room') ? old('total_function_room') : $data->total_function_room}}">
                            @error('total_function_room')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng bộ môn</label>
                            <input type="number" class="form-control" name="total_subject_room" placeholder="Nhập tổng số phòng bộ môn" value="{{old('total_subject_room') ? old('total_subject_room') : $data->total_subject_room}}">
                            @error('total_subject_room')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số trang thiết bị tối thiểu đầy đủ</label>
                            <input type="number" class="form-control" name="total_device_full" placeholder="Nhập tổng số trang thiết bị tối thiểu đầy đủ" value="{{old('total_device_full') ? old('total_device_full') : $data->total_device_full}}">
                            @error('total_device_full')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số trang thiết bị tối thiểu không đầy đủ</label>
                            <input type="number" class="form-control" name="total_device_not_full" placeholder="Nhập tổng số trang thiết bị tối thiểu không đầy đủ" value="{{old('total_device_not_full') ? old('total_device_not_full') : $data->total_device_not_full}}">
                            @error('total_device_not_full')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('admin.school.junior_and_high.list')}}">quay lại</a>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#avatar')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
