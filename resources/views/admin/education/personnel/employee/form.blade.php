@extends('layout.master')
@section('title')
    employee
@endsection
@section('personnel', 'active')
@section('employee', 'active')
@section('personnel-open', 'menu-open')
@section('content_header_name')
    Sửa thông tin nhân viên 
@endsection
@section('content_header_active')
    Sửa thông tin nhân viên 
@endsection
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sửa thông tin nhân viên </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.personnel.employee.form.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã nhân viên</label>
                        <input type="text" name="code" class="form-control" placeholder="Nhập mã nhân viên" value="{{old('code')}}">
                        @error('code')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên nhân viên" value="{{old('name')}}">
                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ảnh đại diện</label>
                        <input type='file' onchange="readURL(this);" name="avatar"/>
                        <br>
                        <img id="avatar" src="#" alt="avatar"/>
                        @error('avatar')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ngày sinh</label>
                        <input type="text" name="birthday" class="form-control" placeholder="Nhập ngày sinh" value="{{old('birthday')}}">
                        @error('birthday')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" value="{{old('phone')}}">
                        @error('phone')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thư điện tử</label>
                        <input type="text" class="form-control" name="email" placeholder="Nhập thư điện tử" value="{{old('email')}}">
                        @error('email')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Giới tính</label>
                        <select class="form-control select2" name="gender" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            @foreach(config('base.gender') as $k => $item)
                                <option value="{{$k}}">{{$item}}</option>
                            @endforeach
                        </select>
                        @error('gender')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
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
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phường/ xã</label>
                        <select class="form-control select2" name="commune_id" id="commune" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                        </select>
                        @error('commune_id')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{old('address')}}">
                        @error('address')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ngày vào làm việc</label>
                        <input type="text" class="form-control" name="day_and_year" placeholder="Nhập ngày vào làm việc" value="{{old('day_and_year')}}">
                        @error('day_and_year')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phân cấp trường học</label>
                        <select class="form-control select2" id="type_school" name="type_school" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            @foreach(config('base.type_of_school') as $k => $item)
                                <option value="{{$k}}">{{$item}}</option>
                            @endforeach
                        </select>
                        @error('type_school')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trường</label>
                        <select class="form-control select2" id="school" name="school_id" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                        </select>
                        @error('school_id')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trình độ</label>
                        <select class="form-control select2" name="level" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            @foreach(config('base.level_of_employee') as $k => $item)
                                <option value="{{$k}}">{{$item}}</option>
                            @endforeach
                        </select>
                        @error('level')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('admin.personnel.employee.list')}}">quay lại</a>
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
            var cat_id = e.target.value;

            $.get('/ajax-get-commune?cat_id=' + cat_id, function (data) {
                $('#commune').empty();
                $.each(data, function (index, commune) {
                    $('#commune').append('<option value="'+commune.id+'">'+commune.name+'</option>');
                })
            })
        });

        $('#type_school').on('change', function (e) {
            var cat_id = e.target.value;

            $.get('/ajax-get-type-student?cat_id=' + cat_id, function (data) {
                $('#school').empty();
                $.each(data, function (index, value) {
                    $('#school').append('<option value="'+value.id+'">'+value.name+'</option>');
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
