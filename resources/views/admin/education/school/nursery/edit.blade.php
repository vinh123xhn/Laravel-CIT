@extends('layout.master')
@section('title')
    nursery school
@endsection
@section('school', 'active')
@section('nursery_school', 'active')
@section('school-open', 'menu-open')
@section('content_header_name')
    Tạo mới trường mầm non
@endsection
@section('content_header_active')
    Tạo mới trường mầm non
@endsection
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới trường mầm non</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.school.nursery.form.update', $school->id)}}" enctype="multipart/form-data">
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
                            <label for="exampleInputPassword1">Tổng số lớp nhóm trẻ</label>
                            <input type="number" class="form-control" name="total_of_nursery_class" placeholder="Nhập tổng số lớp nhóm trẻ" value="{{old('total_of_nursery_class') ? old('total_of_nursery_class') : $data->total_of_nursery_class}}">
                            @error('total_of_nursery_class')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp nhóm 3 - 12 tháng</label>
                            <input type="number" class="form-control" name="total_of_nursery_3_12" placeholder="Nhập tổng số lớp nhóm 3 - 12 tháng" value="{{old('total_of_nursery_3_12') ? old('total_of_nursery_3_12') : $data->total_of_nursery_3_12}}">
                            @error('total_of_nursery_3_12')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp nhóm 13 - 24 tháng</label>
                            <input type="number" class="form-control" name="total_of_nursery_13_24" placeholder="Nhập tổng số lớp nhóm 13 - 24 tháng" value="{{old('total_of_nursery_13_24') ? old('total_of_nursery_13_24') : $data->total_of_nursery_13_24}}">
                            @error('total_of_nursery_13_24')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp nhóm 25 - 36 tháng</label>
                            <input type="number" class="form-control" name="total_of_nursery_25_36" placeholder="Nhập tổng số lớp nhóm 25 - 36 tháng" value="{{old('total_of_nursery_25_36') ? old('total_of_nursery_25_36') : $data->total_of_nursery_25_36}}">
                            @error('total_of_nursery_25_36')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp nhóm trẻ ghép</label>
                            <input type="number" class="form-control" name="total_of_nursery_collect" placeholder="Nhập tổng số lớp nhóm trẻ ghép" value="{{old('total_of_nursery_collect') ? old('total_of_nursery_collect') : $data->total_of_nursery_collect}}">
                            @error('total_of_nursery_collect')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp mẫu giáo</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_class" placeholder="Nhập tổng số phòng học" value="{{old('total_of_kindergarten_class') ? old('total_of_kindergarten_class') : $data->total_of_kindergarten_class}}">
                            @error('total_of_kindergarten_class')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 3 - 4 tuổi</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_3_4" placeholder="Nhập tổng số lớp 3 - 4 tuổi" value="{{old('total_of_kindergarten_3_4') ? old('total_of_kindergarten_3_4') : $data->total_of_kindergarten_3_4}}">
                            @error('total_of_kindergarten_3_4')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 4 - 5 tuổi</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_4_5" placeholder="Nhập tổng số lớp 4 - 5 tuổi" value="{{old('total_of_kindergarten_4_5') ? old('total_of_kindergarten_4_5') : $data->total_of_kindergarten_4_5}}">
                            @error('total_of_kindergarten_4_5')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 5 - 6 tuổi</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_5_6" placeholder="Nhập tổng số lớp 5 - 6 tuổi" value="{{old('total_of_kindergarten_5_6') ? old('total_of_kindergarten_5_6') : $data->total_of_kindergarten_5_6}}">
                            @error('total_of_kindergarten_5_6')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh nhà trẻ</label>
                            <input type="number" class="form-control" name="total_of_nursery_student" placeholder="Nhập tổng số lớp nhóm trẻ" value="{{old('total_of_nursery_student') ? old('total_of_nursery_student') : $data->total_of_nursery_student}}">
                            @error('total_of_nursery_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh nhóm 3 - 12 tháng</label>
                            <input type="number" class="form-control" name="total_of_nursery_3_12_student" placeholder="Nhập tổng số lớp nhóm 3 - 12 tháng" value="{{old('total_of_nursery_3_12_student') ? old('total_of_nursery_3_12_student') : $data->total_of_nursery_3_12_student}}">
                            @error('total_of_nursery_3_12_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh nhóm 13 - 24 tháng</label>
                            <input type="number" class="form-control" name="total_of_nursery_13_24_student" placeholder="Nhập tổng số lớp nhóm 13 - 24 tháng" value="{{old('total_of_nursery_13_24_student') ? old('total_of_nursery_13_24_student') : $data->total_of_nursery_13_24_student}}">
                            @error('total_of_nursery_13_24_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh nhóm 25 - 36 tháng</label>
                            <input type="number" class="form-control" name="total_of_nursery_25_36_student" placeholder="Nhập tổng số lớp nhóm 25 - 36 tháng" value="{{old('total_of_nursery_25_36_student') ? old('total_of_nursery_25_36_student') : $data->total_of_nursery_25_36_student}}">
                            @error('total_of_nursery_25_36_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh nhóm trẻ ghép</label>
                            <input type="number" class="form-control" name="total_of_nursery_collect_student" placeholder="Nhập tổng số lớp nhóm trẻ ghép" value="{{old('total_of_nursery_collect_student') ? old('total_of_nursery_collect_student') : $data->total_of_nursery_collect_student}}">
                            @error('total_of_nursery_collect_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh mẫu giáo</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_student" placeholder="Nhập tổng số phòng học" value="{{old('total_of_kindergarten_student') ? old('total_of_kindergarten_student') : $data->total_of_kindergarten_student}}">
                            @error('total_of_kindergarten_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh 3 - 4 tuổi</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_3_4_student" placeholder="Nhập tổng số lớp 3 - 4 tuổi" value="{{old('total_of_kindergarten_3_4_student') ? old('total_of_kindergarten_3_4_student') : $data->total_of_kindergarten_3_4_student}}">
                            @error('total_of_kindergarten_3_4_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh 4 - 5 tuổi</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_4_5_student" placeholder="Nhập tổng số lớp 4 - 5 tuổi" value="{{old('total_of_kindergarten_4_5_student') ? old('total_of_kindergarten_4_5_student') : $data->total_of_kindergarten_4_5_student}}">
                            @error('total_of_kindergarten_4_5_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh 5 - 6 tuổi</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_5_6_student" placeholder="Nhập tổng số lớp 5 - 6 tuổi" value="{{old('total_of_kindergarten_5_6_student') ? old('total_of_kindergarten_5_6_student') : $data->total_of_kindergarten_5_6_student}}">
                            @error('total_of_kindergarten_5_6_student')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số học sinh lớp mẫu giáo ghép</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_collect_student" placeholder="Nhập tổng số học sinh lớp mẫu giáo ghép" value="{{old('total_of_kindergarten_collect_student') ? old('total_of_kindergarten_collect_student') : $data->total_of_kindergarten_collect_student}}">
                            @error('total_of_kindergarten_collect_student')
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
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số cán bộ quản lý</label>
                            <input type="number" class="form-control" name="total_of_manager" placeholder="Nhập tổng số cán bộ quản lý" value="{{old('total_of_manager') ? old('total_of_manager') : $data->total_of_manager}}">
                            @error('total_of_manager')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số giáo viên nhà trẻ</label>
                            <input type="number" class="form-control" name="total_of_nursery_teacher" placeholder="Nhập tổng số giáo viên nhà trẻ" value="{{old('total_of_nursery_teacher') ? old('total_of_nursery_teacher') : $data->total_of_nursery_teacher}}">
                            @error('total_of_nursery_teacher')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số giáo viên mẫu giáo</label>
                            <input type="number" class="form-control" name="total_of_kindergarten_teacher" placeholder="Nhập tổng số giáo viên mẫu giáo" value="{{old('total_of_kindergarten_teacher') ? old('total_of_kindergarten_teacher') : $data->total_of_kindergarten_teacher}}">
                            @error('total_of_kindergarten_teacher')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số nhân viên</label>
                            <input type="number" class="form-control" name="total_of_employees" placeholder="Nhập tổng số nhân viên" value="{{old('total_of_employees') ? old('total_of_employees') : $data->total_of_employees}}">
                            @error('total_of_employees')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="float-left col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng học nhà trẻ</label>
                            <input type="number" class="form-control" name="total_classroom_nursery" placeholder="Nhập tổng số phòng học nhà trẻ" value="{{old('total_classroom_nursery') ? old('total_classroom_nursery') : $data->total_classroom_nursery}}">
                            @error('total_classroom_nursery')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng học mẫu giáo</label>
                            <input type="number" class="form-control" name="total_classroom_kindergarten" placeholder="Nhập tổng số trang thiết bị tối thiểu không đầy đủ" value="{{old('total_classroom_kindergarten') ? old('total_classroom_kindergarten') : $data->total_classroom_kindergarten}}">
                            @error('total_classroom_kindergarten')
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
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('admin.school.nursery.list')}}">quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('js')
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
