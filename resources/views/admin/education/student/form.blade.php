@extends('layout.master')
@section('title')
    children
@endsection
@section('education', 'active')
@section('student', 'active')
@section('education', 'menu-open')
@section('content_header_name')
    Tạo mới trẻ em
@endsection
@section('content_header_active')
    Tạo mới trẻ em
@endsection
@section('content')
    <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới thông tin trẻ em</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" id="form" method="post" action="{{route('admin.student.form.post')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã Học sinh</label>
                        <input type="text" name="code" class="form-control" placeholder="Nhập mã học sinh" value="{{old('code')}}">
                        @error('code')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên học sinh" value="{{old('name')}}">
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
                        <label for="exampleInputPassword1">Họ tên cha</label>
                        <input type="text" class="form-control" name="name_of_dad" placeholder="Nhập họ tên cha" value="{{old('name_of_dad')}}">
                        @error('name_of_dad')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Họ tên mẹ</label>
                        <input type="text" class="form-control" name="name_of_mom" placeholder="Nhập họ tên mẹ" value="{{old('name_of_mom')}}">
                        @error('name_of_mom')
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
                        <label for="exampleInputPassword1">Học sinh cấp</label>
                        <select class="form-control select2" name="type_school" id="type_school" style="width: 100%;">
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
                            @foreach($schools as $k => $item)
                                <option value="{{$k}}">{{$item}}</option>
                            @endforeach
                        </select>
                        @error('school_id')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Lớp</label>
                        <select class="form-control select2" name="level" style="width: 100%;">
                            @foreach(config('base.level_of_student') as $k => $item)
                                <option value="{{$k}}">{{$item}}</option>
                            @endforeach
                        </select>
                        @error('level')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phân loại học lực</label>
                        <select class="form-control select2" name="type_of_student" style="width: 100%;">
                            <option value="">Lựa chọn</option>
                            @foreach(config('base.type_of_student') as $k => $item)
                                <option value="{{$k}}">{{$item}}</option>
                            @endforeach
                        </select>
                        @error('type_of_student')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('admin.student.list')}}">quay lại</a>
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

        $('#type_school').on('change', function (e) {
            console.log(e);

            var cat_id = e.target.value;

            $.get('/ajax-get-type-student?cat_id=' + cat_id, function (data) {
                $('#school').empty();
                $.each(data, function (index, value) {
                    $('#school').append('<option value="'+value.id+'">'+value.name+'</option>');
                })
            });
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
