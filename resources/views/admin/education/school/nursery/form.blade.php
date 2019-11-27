@extends('layout.master')
@section('title')
    nursery school
@endsection
@section('content_header_name')
    Tạo mới trường mầm non
@endsection
@section('content_header_active')
    Tạo mới trường mầm non
@endsection
@section('school', 'active')
@section('nursery_school', 'active')
@section('school-open', 'menu-open')
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tạo mới trường mầm non</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.school.nursery.form.post')}}">
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
                            <label for="exampleInputPassword1">Tổng số lớp nhóm trẻ</label>
                            <input type="text" class="form-control" name="total_of_nursery_class" placeholder="Nhập tổng số lớp nhóm trẻ" value="{{old('total_of_nursery_class')}}">
                            @error('total_of_nursery_class')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp nhóm 3 - 12 tháng</label>
                            <input type="text" class="form-control" name="total_of_nursery_3_12" placeholder="Nhập tổng số lớp nhóm 3 - 12 tháng" value="{{old('total_of_nursery_3_12')}}">
                            @error('total_of_nursery_3_12')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp nhóm 13 - 24 tháng</label>
                            <input type="text" class="form-control" name="total_of_nursery_13_24" placeholder="Nhập tổng số lớp nhóm 13 - 24 tháng" value="{{old('total_of_nursery_13_24')}}">
                            @error('total_of_nursery_13_24')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp nhóm 25 - 36 tháng</label>
                            <input type="text" class="form-control" name="total_of_nursery_25_36" placeholder="Nhập tổng số lớp nhóm 25 - 36 tháng" value="{{old('total_of_nursery_25_36')}}">
                            @error('total_of_nursery_25_36')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp nhóm trẻ ghép</label>
                            <input type="text" class="form-control" name="total_of_nursery_collect" placeholder="Nhập tổng số lớp nhóm trẻ ghép" value="{{old('total_of_nursery_collect')}}">
                            @error('total_of_nursery_collect')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp mẫu giáo</label>
                            <input type="text" class="form-control" name="total_of_kindergarten_class" placeholder="Nhập tổng số phòng học" value="{{old('total_of_kindergarten_class')}}">
                            @error('total_of_kindergarten_class')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 3 - 4 tuổi</label>
                            <input type="text" class="form-control" name="total_of_kindergarten_3_4" placeholder="Nhập tổng số lớp 3 - 4 tuổi" value="{{old('total_of_kindergarten_3_4')}}">
                            @error('total_of_kindergarten_3_4')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 4 - 5 tuổi</label>
                            <input type="text" class="form-control" name="total_of_kindergarten_4_5" placeholder="Nhập tổng số lớp 4 - 5 tuổi" value="{{old('total_of_kindergarten_4_5')}}">
                            @error('total_of_kindergarten_4_5')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp 5 - 6 tuổi</label>
                            <input type="text" class="form-control" name="total_of_kindergarten_5_6" placeholder="Nhập tổng số lớp 5 - 6 tuổi" value="{{old('total_of_kindergarten_5_6')}}">
                            @error('total_of_kindergarten_5_6')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số lớp mẫu giáo ghép</label>
                            <input type="text" class="form-control" name="total_of_kindergarten_collect" placeholder="Nhập tổng số phòng học" value="{{old('total_of_kindergarten_collect')}}">
                            @error('total_of_kindergarten_collect')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng học nhà trẻ</label>
                            <input type="text" class="form-control" name="total_classroom_nursery" placeholder="Nhập tổng số trang thiết bị tối thiểu đầy đủ" value="{{old('total_classroom_nursery')}}">
                            @error('total_classroom_nursery')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng học mẫu giáo</label>
                            <input type="text" class="form-control" name="total_classroom_kindergarten" placeholder="Nhập tổng số trang thiết bị tối thiểu không đầy đủ" value="{{old('total_classroom_kindergarten')}}">
                            @error('total_classroom_kindergarten')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 float-left">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tổng số phòng chức năng</label>
                            <input type="text" class="form-control" name="total_function_room" placeholder="Nhập tổng số phòng chức năng" value="{{old('total_function_room')}}">
                            @error('total_function_room')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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
